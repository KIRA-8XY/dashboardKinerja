<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pegawai::query();
        $search = $request->query('q');
        $perPage = (int) $request->query('per', 15);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                   ->orWhere('jabatan', 'like', "%{$search}%");
            });
        }

        // Hanya devadmin yang bisa melihat pegawai id 99
        if (auth()->user()->email !== 'devadmin@example.com') {
            $query->where('id', '!=', 99);
        }

        $pegawais = $query->orderBy('nama')->paginate($perPage)->withQueryString();
        return view('admin.pegawai.index', [
            'pegawais' => $pegawais,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'target' => 'nullable|integer',
            'realisasi' => 'nullable|integer',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if ($id == 99 && auth()->user()->email !== 'devadmin@example.com') {
            abort(403, 'Akses ditolak');
        }
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if ($id == 99 && auth()->user()->email !== 'devadmin@example.com') {
            abort(403, 'Akses ditolak');
        }
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($id == 99 && auth()->user()->email !== 'devadmin@example.com') {
            abort(403, 'Akses ditolak');
        }
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'target' => 'nullable|integer',
            'realisasi' => 'nullable|integer',
        ]);

        $pegawai->update($request->only(['nama', 'jabatan', 'target', 'realisasi']));

        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($id == 99 && auth()->user()->email !== 'devadmin@example.com') {
            abort(403, 'Akses ditolak');
        }
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
