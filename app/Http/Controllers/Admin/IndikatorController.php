<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = \App\Models\Indikator::with('pegawai');

        // Hanya devadmin yang bisa melihat indikator milik pegawai id 99
        if (auth()->user()->email !== 'devadmin@example.com') {
            $query->where('pegawai_id', '!=', 99);
        }

        $indikators = $query->get();
        return view('admin.indikator.index', compact('indikators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('admin.indikator.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'nama_indikator' => 'required|string|max:255',
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
        ]);
        Indikator::create($request->all());
        return redirect()->route('admin.indikator.index')->with('success', 'Indikator berhasil ditambah');
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
        $indikator = Indikator::findOrFail($id);
        $pegawais = Pegawai::all();
        return view('admin.indikator.edit', compact('indikator', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $indikator = Indikator::findOrFail($id);
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'nama_indikator' => 'required|string|max:255',
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
        ]);
        $indikator->update($request->all());
        return redirect()->route('admin.indikator.index')->with('success', 'Indikator berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $indikator = Indikator::findOrFail($id);
        $indikator->delete();
        return redirect()->route('admin.indikator.index')->with('success', 'Indikator berhasil dihapus');
    }
}
