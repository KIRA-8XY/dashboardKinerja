{{-- filepath: resources/views/pegawai/indikator/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto animate-fade-up">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Indikator</h1>
    <form action="{{ route('pegawai.indikator.update', $indikator->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4">
            <label>Nama Indikator</label>
            <input type="text" name="nama_indikator" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" value="{{ $indikator->nama_indikator }}" required>
        </div>
        <div class="mb-4">
            <label>Target</label>
            <input type="number" name="target" class="w-full rounded border border-gray-300 px-4 py-2 bg-gray-100 focus:outline-none focus:ring-0" value="{{ $indikator->target }}" readonly>
        </div>
        <div class="mb-4">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" value="{{ $indikator->realisasi }}" required>
        </div>
        <button type="submit" class="px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Update</button>
        <a href="{{ route('pegawai.indikator.index') }}" class="px-4 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Batal</a>
    </form>
</div>
@endsection
