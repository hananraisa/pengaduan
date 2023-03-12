<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function getLaporan(Request $request)
    {
        $from = $request->from  . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $tanggapan = Tanggapan::whereBetween('tgl_tanggapan', [$from, $to])->get();

        $tanggapan = DB::table('tanggapan')
        ->join('pengaduan','pengaduan.id', '=', 'tanggapan.pengaduan_id')
        ->join('petugas','petugas.id', '=', 'tanggapan.petugas_id')
        ->get();

        return view('admin.laporan.index', ['tanggapan' => $tanggapan, 'from' => $from, 'to' => $to])->with('tanggapan', $tanggapan);
    }

    public function cetakLaporan($from, $to)
    {
        $tanggapan = Tanggapan::whereBetween('tgl_tanggapan', [$from, $to])->get();

        $tanggapan = DB::table('tanggapan')
        ->join('pengaduan','pengaduan.id', '=', 'tanggapan.pengaduan_id')
        ->join('petugas','petugas.id', '=', 'tanggapan.petugas_id')
        ->get();

        $pdf = PDF::loadView('admin.laporan.cetak', ['tanggapan' => $tanggapan]);
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
