<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Ganti 99 dengan id pegawai Anda yang ingin di-exclude
        $pegawais = \App\Models\Pegawai::with('indikators')
            ->where('id', '!=', 99)
            ->get();

        return view('admin.dashboard', compact('pegawais'));
    }
}

