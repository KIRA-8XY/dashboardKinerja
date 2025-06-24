{{-- filepath: resources/views/pegawai/riwayat-kinerja/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Riwayat Kinerja</h1>
    <form action="{{ route('pegawai.riwayat-kinerja.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Nama Indikator</label>
            <input type="text" name="nama_indikator" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
        </div>
        <div class="mb-4">
            <label>Target</label>
            <input type="number" name="target" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
        </div>
        <div class="mb-4">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
        </div>
        <div class="mb-4">
            <label>Bulan</label>
            <select name="bulan" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
                @foreach(range(1,12) as $b)
                    <option value="{{ $b }}">{{ DateTime::createFromFormat('!m', $b)->format('F') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label>Tahun</label>
            <input type="number" name="tahun" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" value="{{ now()->year }}" required>
        </div>
        <button type="submit" class="px-4 py-2 rounded bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">Simpan</button>
        <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Batal</a>
    </form>
</div>
@endsection