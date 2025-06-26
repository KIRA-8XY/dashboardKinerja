<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $query = Pegawai::with(['indikators' => function($query) {
            $query->select('id', 'pegawai_id', 'name', 'target', 'realisasi', 'max_score', 'score');
        }]);

        // Hanya devadmin yang bisa melihat pegawai id 99
        if (auth()->user()->email !== 'devadmin@example.com') {
            $query->where('id', '!=', 99);
        }

        $pegawais = $query->get()->map(function($pegawai) {
            $pegawai->total_score = $pegawai->indikators->sum('score');
            return $pegawai;
        });

        return view('admin.dashboard', compact('pegawais'));
    }
}
