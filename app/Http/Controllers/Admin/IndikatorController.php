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
    public function index(Request $request)
    {
        $perPage = $request->input('per', 10);
        $mode = $request->input('mode', 'default');
        $search = $request->input('q');

        $query = Indikator::with('pegawai');

        // Global search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_indikator', 'like', "%{$search}%")
                    ->orWhereHas('pegawai', function ($p) use ($search) {
                        $p->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        // Hanya devadmin yang bisa melihat indikator milik pegawai id 99
        if (auth()->user()->email !== 'devadmin@example.com') {
            $query->where('pegawai_id', '!=', 99);
        }

        // Prioritize indicators needing attention
        $query->orderByRaw('(target <= 0 OR max_score <= 0) DESC');

        // Sorting / ordering based on mode
        switch ($mode) {
            case 'pegawai':
                $query->orderBy('pegawai_id');
                break;
            case 'indikator':
                $query->orderBy('nama_indikator');
                break;
            case 'target_desc':
                $query->orderByDesc('target');
                break;
            case 'target_asc':
                $query->orderBy('target');
                break;
            case 'realisasi_desc':
                $query->orderByDesc('realisasi');
                break;
            case 'realisasi_asc':
                $query->orderBy('realisasi');
                break;
            default:
                $query->orderBy('pegawai_id')->orderBy('nama_indikator');
                break;
        }

        $indikators = $query->paginate($perPage)->withQueryString();

        $grouped = null;
        if ($mode === 'pegawai') {
            $grouped = $indikators->getCollection()->groupBy(fn($item) => $item->pegawai->nama ?? 'Tidak ada Pegawai');
        } elseif ($mode === 'indikator') {
            $grouped = $indikators->getCollection()->groupBy('nama_indikator');
        }

        return view('admin.indikator.index', [
            'indikators' => $indikators,
            'mode' => $mode,
            'grouped' => $grouped,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = Pegawai::query();

        // Exclude developer pegawai (ID 99) for non-devadmin users
        if (auth()->user()->email !== 'devadmin@example.com') {
            $query->where('id', '!=', 99);
        }

        $pegawais = $query->get();
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

        // Only devadmin can edit indikator for pegawai with id 99
        if ($indikator->pegawai_id == 99 && auth()->user()->email !== 'devadmin@example.com') {
            abort(403, 'Unauthorized action.');
        }

        $pegawais = Pegawai::all();
        return view('admin.indikator.edit', compact('indikator', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indikator $indikator)
    {
        $validated = $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'nama_indikator' => 'required|string|max:255',
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'max_score' => 'required|numeric|min:0'
        ]);

        $indikator->update($validated);
        $indikator->calculateScore(); // Calculate and save the score

        return redirect()->route('admin.indikator.index')
            ->with('success', 'Indikator berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $indikator = Indikator::findOrFail($id);

        // Only devadmin can delete indikator for pegawai with id 99
        if ($indikator->pegawai_id == 99 && auth()->user()->email !== 'devadmin@example.com') {
            abort(403, 'Unauthorized action.');
        }

        $indikator->delete();
        return redirect()->route('admin.indikator.index')->with('success', 'Indikator berhasil dihapus');
    }
}
