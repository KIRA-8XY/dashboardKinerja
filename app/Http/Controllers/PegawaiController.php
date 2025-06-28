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
        $total_score = $pegawai->indikators->sum('score');
        return view('pegawai.dashboard', compact('pegawai', 'indikators', 'total_score'));
    }

    public function dashboard()
    {
        $pegawai = auth()->user()->pegawai;

        if (!$pegawai) {
            // Handle case where user does not have an associated pegawai record
            return redirect()->route('login')->with('error', 'Tidak ada data pegawai yang terkait dengan akun Anda.');
        }

        $indikators = $pegawai->indikators;

        if (is_null($indikators)) {
            // Handle case where indikators are null
            $indikators = collect(); // Use an empty collection
        }

        $green_kpis = $indikators->filter(function($indikator) {
            if ($indikator->target == 0) return false;
            $percentage = ($indikator->realisasi / $indikator->target) * 100;
            return $percentage >= 100;
        })->count();

        $yellow_kpis = $indikators->filter(function($indikator) {
            if ($indikator->target == 0) return false;
            $percentage = ($indikator->realisasi / $indikator->target) * 100;
            return $percentage >= 80 && $percentage < 100;
        })->count();

        $red_kpis = $indikators->filter(function($indikator) {
            if ($indikator->target == 0) return false;
            $percentage = ($indikator->realisasi / $indikator->target) * 100;
            return $percentage < 80;
        })->count();

        $total_score = $indikators->sum('score');

        return view('pegawai.dashboard', compact(
            'pegawai',
            'indikators',
            'green_kpis',
            'yellow_kpis',
            'red_kpis',
            'total_score'
        ));
    }
}
