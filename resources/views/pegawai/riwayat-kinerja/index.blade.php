{{-- filepath: resources/views/pegawai/riwayat-kinerja/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('pegawai.riwayat-kinerja.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">+ Tambah Riwayat</a>
    </div>
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-left">
        <thead class="bg-gray-100 text-gray-700 whitespace-nowrap">
            <tr class="hover:bg-gray-50">
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Nama Indikator</th>
                <th class="px-6 py-3">Target</th>
                <th class="px-6 py-3">Realisasi</th>
                <th class="px-6 py-3">Bulan</th>
                <th class="px-6 py-3">Tahun</th>
                <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($riwayats as $i => $riwayat)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-3">{{ $i+1 }}</td>
                <td class="px-6 py-3">{{ $riwayat->nama_indikator }}</td>
                <td class="px-6 py-3">{{ number_format($riwayat->target) }}</td>
                <td class="px-6 py-3">{{ number_format($riwayat->realisasi) }}</td>
                <td class="px-6 py-3">{{ $riwayat->bulan }}</td>
                <td class="px-6 py-3">{{ $riwayat->tahun }}</td>
                <td>
                    <a href="{{ route('pegawai.riwayat-kinerja.edit', $riwayat->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('pegawai.riwayat-kinerja.destroy', $riwayat->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
            </table>
    </div>
</div>
@endsection