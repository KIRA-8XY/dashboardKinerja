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
        $indikators = auth()->user()->indikators;

        $green_kpis = $indikators->filter(function($indikator) {
            $percentage = ($indikator->realisasi / $indikator->target) * 100;
            return $percentage >= 100;
        })->count();

        $yellow_kpis = $indikators->filter(function($indikator) {
            $percentage = ($indikator->realisasi / $indikator->target) * 100;
            return $percentage >= 80 && $percentage < 100;
        })->count();

        $red_kpis = $indikators->filter(function($indikator) {
            $percentage = ($indikator->realisasi / $indikator->target) * 100;
            return $percentage < 80;
        })->count();

        $total_score = $indikators->sum('score');

        return view('pegawai.dashboard', compact(
            'indikators',
            'green_kpis',
            'yellow_kpis',
            'red_kpis',
            'total_score'
        ));
    }
}
