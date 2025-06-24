{{-- filepath: resources/views/admin/pegawai/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-xl font-bold mb-6 text-gray-800">Daftar Pegawai</h2>
    <a href="{{ route('admin.pegawai.create') }}" class="mb-4 inline-block px-5 py-2 rounded bg-pink-600 text-white font-semibold shadow hover:bg-pink-700 transition">Tambah Pegawai</a>
    <div class="bg-white rounded-xl shadow p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Jabatan</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($pegawais as $i => $pegawai)
                <tr>
                    <td class="px-4 py-2 text-gray-700">{{ $i+1 }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $pegawai->nama }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $pegawai->jabatan }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}" class="inline-block px-3 py-1 rounded bg-yellow-400 text-white font-semibold hover:bg-yellow-500 transition">Edit</a>
                        <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}" method="POST" class="inline delete-form">
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
