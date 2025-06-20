<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('dashboard', compact('pegawais'));
    }
}
