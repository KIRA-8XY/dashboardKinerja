{{-- filepath: resources/views/admin/pegawai/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Manajemen Pegawai')

@section('content')
<div class="max-w-7xl mx-auto px-4 space-y-6">
    @if(request()->has('q'))
    <div class="mb-4">
        <a href="{{ route('admin.pegawai.index') }}" class="inline-flex items-center text-cyan-600 hover:text-cyan-700 font-medium transition-colors duration-200">
            <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Pegawai
        </a>
    </div>
    @endif
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h1 class="text-2xl font-bold text-gray-800 animate-fade-up" style="animation-delay: 0.1s">Manajemen Pegawai</h1>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="{{ route('admin.pegawai.create') }}" class="inline-flex items-center px-4 py-2 bg-cyan-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md shadow-sm animate-fade-up" style="animation-delay: 0.2s">
                <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Pegawai
            </a>
            <form method="GET" class="flex items-center gap-2" onsubmit="return validateSearchForm(this)">
                <div class="relative">
                    <input type="text" name="q" id="searchInput" value="{{ request('q') }}" placeholder="Cari nama/jabatan"
                        class="w-full sm:w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 shadow-sm transition-all duration-200" required
                        minlength="2" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <script>
                    function validateSearchForm(form) {
                        const searchInput = form.querySelector('input[name="q"]');
                        if (!searchInput.value.trim()) {
                            searchInput.focus();
                            return false;
                        }
                        return true;
                    }
                </script>
                <button type="submit" class="btn btn-primary focus:ring-2 focus:ring-cyan-400 transform transition-transform duration-200 hover:scale-105" aria-label="Cari">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 9 7.5 7.5 0 0116.65 16.65z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden animate-fade-up" style="animation-delay: 0.3s">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="transition-all duration-200">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pegawai</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                    <th scope="col" class="w-10 px-2 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pegawais as $i => $pegawai)
                <tr class="hover:bg-gray-50 transition-all duration-200 transform hover:scale-[1.005] group animate-fade-up" style="animation-delay: {{ 0.4 + ($loop->index * 0.03) }}s">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pegawais->firstItem() + $i }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                <svg class="h-6 w-6 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $pegawai->nama }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $pegawai->jabatan ?? '-' }}</div>
                        <div class="text-xs text-gray-400 italic">{{ empty($pegawai->jabatan) ? 'Jabatan belum diisi' : '' }}</div>
                    </td>
                    <td class="w-10 px-2 py-4 whitespace-nowrap relative z-20">
                        <div class="inline-block text-left" x-data="{ open{{ $pegawai->id }}: false }">
                            <button @click="open{{ $pegawai->id }} = !open{{ $pegawai->id }}" class="p-1 rounded-full hover:bg-gray-100 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01" />
                                </svg>
                            </button>

                            <div x-show="open{{ $pegawai->id }}" @click.away="open{{ $pegawai->id }} = false" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                <div class="py-1">
                                    <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                    <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}" method="POST" class="block w-full text-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100" onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $pegawais->links() }}</div>
</div>
@endsection
