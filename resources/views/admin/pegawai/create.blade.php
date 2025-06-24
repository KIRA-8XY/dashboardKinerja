{{-- filepath: resources/views/admin/pegawai/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-800">Tambah Pegawai</h2>
    <form action="{{ route('admin.pegawai.store') }}" method="POST" class="space-y-4 bg-white rounded-xl shadow p-6">
        @csrf
        <div>
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Jabatan</label>
            <input type="text" name="jabatan" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Target</label>
            <input type="number" name="target" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Realisasi</label>
            <input type="number" name="realisasi" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-5 py-2 rounded bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">Simpan</button>
            <a href="{{ route('admin.pegawai.index') }}" class="px-5 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
