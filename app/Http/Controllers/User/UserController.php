<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function masyarakat()
    {
        return view('user.masyarakat');
    }

    public function isipengaduan()
    {
        return view('user.isipengaduan');
    }

    public function formLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $username = Masyarakat::where('username', $request->username)->first(); //mengecek di table masyarakat, username, yang di dollar data di form

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password); 

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('pengaduan.masyarakat');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        
        $data = $request->all();
       
        $validate = Validator::make($data, [
            'nik' => ['required'],
            'nama' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Masyarakat::where('username', $request->username)->first(); // pengecekan data sudah ada atau belum di database jika sudah ada maka akan gagal

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }
        
        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        return redirect()->route('pengaduan.formLogin');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();

        return redirect()->route('pengaduan.formLogin');
    }

    public function storePengaduan(Request $request)
    {
        if (!Auth::guard('masyarakat')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'isi_laporan' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $userHistory = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->get();

        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan' => $data['isi_laporan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        if ($pengaduan) {
            return redirect()->route('pengaduan.historipengaduan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function historipengaduan($siapa = '')
    {
        $terverifikasi = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->get()->count();
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();
        $userHistory = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->get();

        $hitung = [$terverifikasi, $proses, $selesai];

        if ($siapa == 'me') {
            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.histori', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa, 'userHistory' => $userHistory]);
        } else {
            $pengaduan = Pengaduan::where([['nik', '!=', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.histori', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa, 'userHistory' => $userHistory]);
        }
    }
    public function tanggapan()
    { 
        // $tanggapan = Tanggapan::all();
        // $pengaduan = Pengaduan::all();

        // return view('user.tanggapan', ['tanggapan' => $tanggapan, 'pengaduan' => $pengaduan]);

        $tanggapan = DB::table('tanggapan')
        ->join('pengaduan','pengaduan.id', '=', 'tanggapan.pengaduan_id')
        ->get();

        //tampilkan view barang dan kirim datanya ke view tersebut
        return view('user.tanggapan')->with('tanggapan', $tanggapan);
    }
}
