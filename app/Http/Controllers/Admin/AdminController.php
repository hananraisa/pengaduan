<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function formlogin()
    {
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        $username = Petugas::where('username', $request->username)->first();

        if(!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if(!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        $auth = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]);

        if($auth) {
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->with(['pesan' => 'Akun tidak Terdaftar']);
        }

    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
 
        return redirect()->route('admin.formlogin');
    }

    public function index ()
    {
        $petugas = Petugas::all()->count();

        $masyarakat = Masyarakat::all()->count();

        $proses = Pengaduan::where('status', 'proses')->get()->count();

        $selesai = Pengaduan::where('status', 'selesai')->get()->count();

        return view('Admin.Dashboard', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'proses' => $proses, 'selesai' => $selesai]);
    }
}
