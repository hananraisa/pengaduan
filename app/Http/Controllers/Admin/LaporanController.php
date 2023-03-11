<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    // public function laporan()
    // {
    //     return view('admin.laporan.index');
    // }
    public function laporan()
    {
        $pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

        return view('admin.laporan.index', ['pengaduan' =>$pengaduan]);
    }
}
