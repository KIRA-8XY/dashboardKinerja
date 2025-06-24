<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $query = \App\Models\Pegawai::with('indikators');

        // Hanya devadmin yang bisa melihat pegawai id 99
        if (auth()->user()->email !== 'devadmin@example.com') {
            $query->where('id', '!=', 99);
        }

        $pegawais = $query->get();
        return view('admin.dashboard', compact('pegawais'));
    }
}

