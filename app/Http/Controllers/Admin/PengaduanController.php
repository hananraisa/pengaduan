<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

        return view('Admin.Pengaduan', ['pengaduan' =>$pengaduan]);
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->first();

        $tanggapan = Tanggapan::where('pengaduan_id', $id)->first();

        return view('Admin.Pengaduan', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan]);
    }
}
