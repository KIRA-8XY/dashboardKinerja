{{-- filepath: resources/views/pegawai/riwayat-kinerja/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto animate-fade-up bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Riwayat Kinerja</h1>
    <form action="{{ route('pegawai.riwayat-kinerja.update', $riwayat->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Nama Indikator</label>
            <input type="text" name="nama_indikator" value="{{ $riwayat->nama_indikator }}" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Target</label>
            <input type="number" name="target" value="{{ $riwayat->target }}" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Realisasi</label>
            <input type="number" name="realisasi" value="{{ $riwayat->realisasi }}" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Bulan</label>
            <select name="bulan" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                @foreach(range(1,12) as $b)
                    <option value="{{ $b }}" @if($riwayat->bulan == $b) selected @endif>{{ DateTime::createFromFormat('!m', $b)->format('F') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tahun</label>
            <input type="number" name="tahun" value="{{ $riwayat->tahun }}" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <button type="submit" class="px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Update</button>
        <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Batal</a>
    </form>
</div>
@endsection