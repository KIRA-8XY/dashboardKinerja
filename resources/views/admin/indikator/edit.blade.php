{{-- filepath: resources/views/admin/indikator/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-800">Edit Indikator</h2>
    <form action="{{ route('admin.indikator.update', $indikator->id) }}" method="POST" class="space-y-4 bg-white rounded-xl shadow p-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1 font-semibold">Pegawai</label>
            <select name="pegawai_id"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}" {{ $indikator->pegawai_id == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Nama Indikator</label>
            <input type="text" name="nama_indikator"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="{{ $indikator->nama_indikator }}" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Target</label>
            <input type="number" name="target"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="{{ $indikator->target }}" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Realisasi</label>
            <input type="number" name="realisasi"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="{{ $indikator->realisasi }}" required>
        </div>
        <div class="mb-4">
            <label for="max_score" class="block text-gray-700 text-sm font-bold mb-2">Skor Maksimal</label>
            <input type="number" step="0.01" name="max_score" id="max_score" value="{{ old('max_score', $indikator->max_score) }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('max_score')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-5 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Update</button>
            <a href="{{ route('admin.indikator.index') }}" class="px-5 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
