{{-- filepath: resources/views/admin/indikator/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-xl font-bold mb-6 text-gray-800">Daftar Indikator</h2>
    <a href="{{ route('admin.indikator.create') }}" class="mb-4 inline-block px-5 py-2 rounded bg-pink-600 text-white font-semibold shadow hover:bg-pink-700 transition">Tambah Indikator</a>
    <div class="bg-white rounded-xl shadow p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pegawai</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Indikator</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Target</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Realisasi</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($indikators as $i => $indikator)
                <tr>
                    <td class="px-4 py-2 text-gray-700">{{ $i+1 }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $indikator->pegawai->nama ?? '-' }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $indikator->nama_indikator }}</td>
                    <td class="px-4 py-2 text-center text-gray-600">{{ number_format($indikator->target) }}</td>
                    <td class="px-4 py-2 text-center text-gray-600">{{ number_format($indikator->realisasi) }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('admin.indikator.edit', $indikator->id) }}" class="inline-block px-3 py-1 rounded bg-yellow-400 text-white font-semibold hover:bg-yellow-500 transition">Edit</a>
                        <form action="{{ route('admin.indikator.destroy', $indikator->id) }}" method="POST" class="inline delete-form">
                            @csrf @method('DELETE')
                            <button type="submit" class="inline-block px-3 py-1 rounded bg-red-500 text-white font-semibold hover:bg-red-600 transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
