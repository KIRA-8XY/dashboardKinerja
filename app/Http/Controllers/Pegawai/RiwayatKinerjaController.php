<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\RiwayatKinerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = RiwayatKinerja::where('pegawai_id', Auth::user()->pegawai_id)->get();
        return view('pegawai.riwayat-kinerja.index', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.riwayat-kinerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_indikator' => 'required|string|max:255',
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2100',
        ]);

        RiwayatKinerja::create([
            'pegawai_id' => Auth::user()->pegawai_id,
            'nama_indikator' => $request->nama_indikator,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('pegawai.riwayat-kinerja.index')->with('success', 'Riwayat kinerja berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $riwayat = RiwayatKinerja::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);
        return view('pegawai.riwayat-kinerja.show', compact('riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $riwayat = RiwayatKinerja::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);
        return view('pegawai.riwayat-kinerja.edit', compact('riwayat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $riwayat = RiwayatKinerja::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);

        $request->validate([
            'nama_indikator' => 'required|string|max:255',
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2100',
        ]);

        $riwayat->update($request->only(['nama_indikator', 'target', 'realisasi', 'bulan', 'tahun']));

        return redirect()->route('pegawai.riwayat-kinerja.index')->with('success', 'Riwayat kinerja berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $riwayat = RiwayatKinerja::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);
        $riwayat->delete();

        return redirect()->route('pegawai.riwayat-kinerja.index')->with('success', 'Riwayat kinerja berhasil dihapus');
    }
}
