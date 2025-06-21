<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with('indikators')->get(); // tampilkan semua pegawai dengan indikator
        return view('admin.dashboard', compact('pegawais'));
    }
}

