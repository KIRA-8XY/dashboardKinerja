<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Indikator;

class PegawaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // pastikan relasi ada
        $pegawai = $user->pegawai;

        // jika pegawai tidak ditemukan, redirect dengan error
        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan untuk user ini.');
        }

        $indikators = $pegawai->indikators()->paginate(10);

        return view('pegawai.dashboard', compact('pegawai', 'indikators'));
    }
}
