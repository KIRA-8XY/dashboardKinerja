<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Indikator;
use App\Models\RiwayatKinerja;
use Carbon\Carbon;

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

        $indikators = $pegawai->indikators ?? [];

        // ambil semua riwayat kinerja milik pegawai
        $riwayatKinerjas = RiwayatKinerja::where('pegawai_id', $pegawai->id)
                            ->orderByDesc('tahun')
                            ->orderByDesc('bulan')
                            ->get();

        return view('pegawai.dashboard', compact('pegawai', 'indikators', 'riwayatKinerjas'));
    }

    public function kinerjaPerBulan(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);
        $pegawai = Auth::user()->pegawai;

        $riwayat = RiwayatKinerja::where('pegawai_id', $pegawai->id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();

        return view('pegawai.kinerja', compact('riwayat', 'bulan', 'tahun'));
    }
}
