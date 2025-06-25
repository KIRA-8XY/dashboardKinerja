{{-- filepath: resources/views/pegawai/indikator/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Indikator Saya</h1>
    <div class="mb-6">
        <a href="{{ route('pegawai.indikator.create') }}" class="inline-block px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">+ Tambah Indikator</a>
    </div>
    <div class="card-wrapper overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-left">
        <thead>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Nama Indikator</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Target</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Realisasi</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            @foreach($indikators as $i => $indikator)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-3">{{ $i+1 }}</td>
                <td class="px-6 py-3">{{ $indikator->nama_indikator }}</td>
                <td class="px-6 py-3">{{ number_format($indikator->target) }}</td>
                <td class="px-6 py-3">{{ number_format($indikator->realisasi) }}</td>
                <td class="px-6 py-3 text-center">
                    <a href="{{ route('pegawai.indikator.edit', $indikator->id) }}" class="btn btn-warning mr-2">Edit</a>
                    <form action="{{ route('pegawai.indikator.destroy', $indikator->id) }}" method="POST" class="inline delete-form">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
            </table>
    </div>
</div>
@endsection