{{-- filepath: resources/views/admin/indikator/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Manajemen Indikator')

@section('content')
<div class="max-w-7xl mx-auto px-4 space-y-6">
    @if(request()->has('q'))
    <div class="mb-4">
        <a href="{{ route('admin.indikator.index') }}" class="inline-flex items-center text-cyan-600 hover:text-cyan-700 font-medium transition-colors duration-200">
            <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Indikator
        </a>
    </div>
    @endif
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h1 class="text-2xl font-bold text-gray-800 animate-fade-up" style="animation-delay: 0.1s">Manajemen Indikator</h1>
        <div class="flex flex-col sm:flex-row gap-3 items-center">
            <a href="{{ route('admin.indikator.create') }}" class="inline-flex items-center px-4 py-2 bg-cyan-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md shadow-sm animate-fade-up" style="animation-delay: 0.2s">
                <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Indikator
            </a>
            <form method="GET" class="flex items-center gap-2" onsubmit="return validateSearchForm(this)">
                <div class="relative">
                    <input type="text" name="q" id="searchInput" value="{{ request('q') }}" placeholder="Cari indikator/pegawai"
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
                <input type="hidden" name="per" value="{{ $perPage }}">
                <input type="hidden" name="mode" value="{{ $mode }}">
            </form>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600 whitespace-nowrap">Tampilan:</span>
                <form method="GET">
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="per" value="{{ $perPage }}">
                    <div class="relative">
                        <select name="mode" onchange="this.form.submit()" class="appearance-none bg-white border border-gray-300 text-sm rounded-lg pl-3 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 shadow-sm">
                            <option value="default" {{ $mode==='default' ? 'selected' : '' }}>Default</option>
                            <option value="pegawai" {{ $mode==='pegawai' ? 'selected' : '' }}>Group by Pegawai</option>
                            <option value="indikator" {{ $mode==='indikator' ? 'selected' : '' }}>Group by Indikator</option>
                            <option value="target_desc" {{ $mode==='target_desc' ? 'selected' : '' }}>Target Tertinggi</option>
                            <option value="target_asc" {{ $mode==='target_asc' ? 'selected' : '' }}>Target Terendah</option>
                            <option value="realisasi_desc" {{ $mode==='realisasi_desc' ? 'selected' : '' }}>Realisasi Tertinggi</option>
                            <option value="realisasi_asc" {{ $mode==='realisasi_asc' ? 'selected' : '' }}>Realisasi Terendah</option>
                        </select>
                    </div>
                </form>
            </div>
            <form method="GET" class="relative">
                <input type="hidden" name="mode" value="{{ $mode }}">
                <input type="hidden" name="q" value="{{ request('q') }}">
                <select name="per" onchange="this.form.submit()" class="appearance-none bg-white border border-gray-300 text-sm rounded-lg pl-3 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 shadow-sm">
                    @foreach([10,15,25,50,100] as $size)
                        <option value="{{ $size }}" {{ $perPage==$size ? 'selected' : '' }}>{{ $size }} / halaman</option>
                    @endforeach
                </select>
                <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </form>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-visible">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="transition-all duration-200">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Indikator</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pegawai</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Target</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Realisasi</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score/Max</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($grouped)
                    @foreach($grouped as $groupKey => $rows)
                        <tr class="bg-cyan-50 animate-fade-up" style="animation-delay: {{ 0.4 + ($loop->index * 0.05) }}s">
                            <td colspan="7" class="px-4 py-2 font-semibold text-cyan-700">{{ $groupKey }}</td>
                        </tr>
                        @foreach($rows as $indikator)
                            @php
                                $percentage = $indikator->target > 0 ? ($indikator->realisasi / $indikator->target) * 100 : 0;
                                $score = round(($percentage / 100) * $indikator->max_score, 2);

                                if ($percentage >= 100) {
                                    $color = 'bg-green-100 text-green-800';
                                } elseif ($percentage >= 80) {
                                    $color = 'bg-yellow-100 text-yellow-800';
                                } else {
                                    $color = 'bg-red-100 text-red-800';
                                }
                            @endphp
                            <tr x-data="{ open: false }" class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $indikator->nama_indikator }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $indikator->pegawai->nama }}</div>
                                            <div class="text-xs text-gray-500">{{ $indikator->pegawai->jabatan ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($indikator->target) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($indikator->realisasi) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $color }}">
                                        {{ $score }}/{{ number_format($indikator->max_score, 2) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right relative" :class="{'z-10': open}">
                                    <div @keydown.escape.stop="open = false" @click.away="open = false" class="inline-block text-left">
                                        <div>
                                            <button @click="open = !open" type="button" class="p-1 rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-gray-100" id="menu-button-{{$indikator->id}}" aria-expanded="true" aria-haspopup="true">
                                                <span class="sr-only">Open options</span>
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-{{$indikator->id}}" tabindex="-1" style="display: none;">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('admin.indikator.edit', $indikator->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0-{{$indikator->id}}">
                                                    <svg class="inline h-4 w-4 mr-2 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.indikator.destroy', $indikator->id) }}" method="POST" role="none">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1-{{$indikator->id}}" onclick="return confirm('Apakah Anda yakin ingin menghapus indikator ini?')">
                                                        <svg class="inline h-4 w-4 mr-2 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($indikators as $i => $indikator)
                        @php
                            $percentage = $indikator->target > 0 ? ($indikator->realisasi / $indikator->target) * 100 : 0;
                            $score = round(($percentage / 100) * $indikator->max_score, 2);

                            if ($percentage >= 100) {
                                $color = 'bg-green-100 text-green-800';
                                $icon = '🟩';
                            } elseif ($percentage >= 80) {
                                $color = 'bg-yellow-100 text-yellow-800';
                                $icon = '🟨';
                            } else {
                                $color = 'bg-red-100 text-red-800';
                                $icon = '🟥';
                            }
                        @endphp
                        <tr x-data="{ open: false }" class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $indikators->firstItem() + $i }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $indikator->nama_indikator }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $indikator->pegawai->nama }}</div>
                                        <div class="text-xs text-gray-500">{{ $indikator->pegawai->jabatan ?? '' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($indikator->target) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($indikator->realisasi) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $color }}">
                                    {{ number_format($score, 2) }}/{{ number_format($indikator->max_score, 2) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right relative" :class="{'z-10': open}">
                                <div @keydown.escape.stop="open = false" @click.away="open = false" class="inline-block text-left">
                                    <div>
                                        <button @click="open = !open" type="button" class="p-1 rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-gray-100" id="menu-button-{{$indikator->id}}" aria-expanded="true" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-{{$indikator->id}}" tabindex="-1" style="display: none;">
                                        <div class="py-1" role="none">
                                            <a href="{{ route('admin.indikator.edit', $indikator->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0-{{$indikator->id}}">
                                                <svg class="inline h-4 w-4 mr-2 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.indikator.destroy', $indikator->id) }}" method="POST" role="none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1-{{$indikator->id}}" onclick="return confirm('Apakah Anda yakin ingin menghapus indikator ini?')">
                                                    <svg class="inline h-4 w-4 mr-2 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $indikators->links() }}</div>
</div>
@endsection
