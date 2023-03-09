<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index()
    { 
        $masyarakat = Masyarakat::all();
    
        return view('admin.masyarakat', ['masyarakat' => $masyarakat]);
    }
}
