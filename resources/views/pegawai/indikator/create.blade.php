{{-- filepath: resources/views/pegawai/indikator/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto card-wrapper">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Indikator</h1>
    <form action="{{ route('pegawai.indikator.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Nama Indikator</label>
            <input type="text" name="nama_indikator" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="mb-4">
            <label>Target</label>
            <input type="number" name="target" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="mb-4">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="w-full rounded border border-cyan-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pegawai.indikator.index') }}" class="btn btn-primary">Batal</a>
    </form>
</div>
@endsection