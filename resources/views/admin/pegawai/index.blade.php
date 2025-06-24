{{-- filepath: resources/views/admin/pegawai/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pegawai</h2>
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
            <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary shadow whitespace-nowrap">Tambah Pegawai</a>
            <form method="GET" class="flex items-center gap-2">

                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari pegawai / jabatan" class="w-full sm:w-64 rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 shadow-sm" />
                <button type="submit" class="btn btn-primary focus:ring-2 focus:ring-cyan-400" aria-label="Cari">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 9 7.5 7.5 0 0116.65 16.65z" />
                    </svg>
                </button>




            </form>
        </div>
    </div>
    <div class="card-wrapper overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="even:bg-gray-50 hover:bg-gray-100">
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Jabatan</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($pegawais as $i => $pegawai)
                <tr class="even:bg-gray-50 hover:bg-gray-100">
                    <td class="px-4 py-2 text-gray-700">{{ $pegawais->firstItem() + $i }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $pegawai->nama }}</td>
                    <td class="px-4 py-2 {{ empty($pegawai->jabatan) ? 'text-gray-500 italic' : 'text-gray-700' }}">
                        {{ empty($pegawai->jabatan) ? 'Silahkan lengkapi jabatan pegawai ini' : $pegawai->jabatan }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}" method="POST" class="inline delete-form">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
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
