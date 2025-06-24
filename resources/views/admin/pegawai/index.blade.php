{{-- filepath: resources/views/admin/pegawai/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pegawai</h2>
        <div class="flex flex-wrap items-center gap-4">
            <a href="{{ route('admin.pegawai.create') }}" class="px-5 py-2 rounded bg-pink-600 text-white font-semibold shadow hover:bg-pink-700 transition whitespace-nowrap">Tambah Pegawai</a>
            <form method="GET" class="flex items-center gap-2">

                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari pegawai / jabatan" class="w-44 md:w-64 rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm" />
                <button type="submit" class="px-3 py-2 rounded bg-pink-600 text-white hover:bg-pink-700 focus:ring-2 focus:ring-pink-400" aria-label="Cari">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 9 7.5 7.5 0 0116.65 16.65z" />
                    </svg>
                </button>




            </form>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6 overflow-x-auto ring-1 ring-gray-200">
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
                    <td class="px-4 py-2 text-gray-700">{{ $pegawais->firstItem() + $i }}</td>
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
            <div class="mt-4">{{ $pegawais->links() }}</div>
    </div>
</div>
@endsection
