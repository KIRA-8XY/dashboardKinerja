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

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-visible">
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
                <tr x-data="{ open: false }" class="hover:bg-gray-50 transition-colors duration-200" :class="{'relative z-10': open}">
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
                    <td class="px-6 py-4 whitespace-nowrap text-right relative" :class="{'z-10': open}">
                        <div @keydown.escape.stop="open = false" @click.away="open = false" class="inline-block text-left">
                            <div>
                                <button @click="open = !open" type="button" class="p-1 rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-gray-100" id="menu-button-{{$pegawai->id}}" aria-expanded="true" aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="menu-button-{{$pegawai->id}}" tabindex="-1"
                                 style="display: none;">
                                <div class="py-1" role="none">
                                    <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0-{{$pegawai->id}}">
                                        <svg class="h-4 w-4 mr-2 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <span class="ml-2">Edit</span>
                                    </a>
                                    <form action="{{ route('admin.pegawai.reset-password', $pegawai->id) }}" method="POST" role="none" onsubmit="return confirm('Apakah Anda yakin ingin mereset password pegawai ini ke default?')">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                                            <svg class="h-4 w-4 mr-2 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0011.667 0l3.181-3.183m-4.991 0l-3.182-3.182a8.25 8.25 0 00-11.667 0l3.182 3.182z" />
                                            </svg>
                                            <span class="ml-2">Reset Password</span>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}" method="POST" role="none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-100" role="menuitem" tabindex="-1" id="menu-item-1-{{$pegawai->id}}" onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">
                                            <svg class="inline h-4 w-4 mr-2 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            <span class="ml-2">Hapus</span>
                                        </button>
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
