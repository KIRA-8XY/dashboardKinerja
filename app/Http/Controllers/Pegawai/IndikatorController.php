<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indikators = Indikator::where('pegawai_id', Auth::user()->pegawai_id)->get();
        return view('pegawai.indikator.index', compact('indikators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.indikator.create');
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
        ]);
        Indikator::create([
            'pegawai_id' => Auth::user()->pegawai_id,
            'nama_indikator' => $request->nama_indikator,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
        ]);
        return redirect()->route('pegawai.indikator.index')->with('success', 'Indikator berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $indikator = Indikator::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);
        return view('pegawai.indikator.edit', compact('indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $indikator = Indikator::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);
        $request->validate([
            'nama_indikator' => 'required|string|max:255',
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
        ]);
        $indikator->update($request->only(['nama_indikator', 'target', 'realisasi']));
        return redirect()->route('pegawai.indikator.index')->with('success', 'Indikator berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $indikator = Indikator::where('pegawai_id', Auth::user()->pegawai_id)->findOrFail($id);
        $indikator->delete();
        return redirect()->route('pegawai.indikator.index')->with('success', 'Indikator berhasil dihapus');
    }
}
