<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        $pegawai = Auth::user()->pegawai;
        $indikators = $pegawai->indikators ?? [];

        return view('pegawai.dashboard', compact('pegawai', 'indikators'));
    }
}
