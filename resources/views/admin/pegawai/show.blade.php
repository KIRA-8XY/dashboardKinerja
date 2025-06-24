{{-- filepath: resources/views/admin/pegawai/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-6 text-gray-800">Detail Pegawai</h2>
    <div class="space-y-3">
        <div>
            <span class="font-semibold text-gray-700">Nama:</span>
            <span class="text-gray-800">{{ $pegawai->nama }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Jabatan:</span>
            <span class="text-gray-800">{{ $pegawai->jabatan }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Target:</span>
            <span class="text-gray-800">{{ number_format($pegawai->target) }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Realisasi:</span>
            <span class="text-gray-800">{{ number_format($pegawai->realisasi) }}</span>
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('admin.pegawai.index') }}" class="px-5 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Kembali</a>
    </div>
</div>
@endsection
