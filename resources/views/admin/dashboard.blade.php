@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 space-y-6 animate-fade-up">
    <div class="flex flex-col gap-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>

        <!-- Welcome Card -->
        <div class="p-4 rounded-xl bg-gradient-to-r from-cyan-600 to-blue-700 shadow-sm border border-cyan-100">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-white/20 rounded-lg">
                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <div class="text-white">
                    <p class="text-sm">Selamat Datang</p>
                    <p class="font-medium">{{ Auth::user()->name ?? 'Admin' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <!-- Total Pegawai -->
        <div class="p-5 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 shadow-md relative overflow-hidden group hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute right-0 top-0 w-24 h-24 bg-white/10 rounded-full filter blur-lg -mr-6 -mt-6"></div>
            <div class="relative flex items-center gap-4">
                <div class="p-2.5 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.9 4.024a9 9 0 01-13.779 13.78z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-white">{{ $pegawais->count() }}</span>
                    <span class="text-white/90 text-sm">Total Pegawai</span>
                </div>
            </div>
        </div>

        <!-- Total Indikator -->
        <div class="p-5 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 shadow-md relative overflow-hidden group hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute right-0 top-0 w-24 h-24 bg-white/10 rounded-full filter blur-lg -mr-6 -mt-6"></div>
            <div class="relative flex items-center gap-4">
                <div class="p-2.5 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-white">{{ $pegawais->sum(fn($p) => $p->indikators->count()) }}</span>
                    <span class="text-white/90 text-sm">Total Indikator</span>
                </div>
            </div>
        </div>

        <!-- Total Realisasi -->
        <div class="p-5 rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 shadow-md relative overflow-hidden group hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute right-0 top-0 w-24 h-24 bg-white/10 rounded-full filter blur-lg -mr-6 -mt-6"></div>
            <div class="relative flex items-center gap-4">
                <div class="p-2.5 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-white">{{ number_format($pegawais->sum(fn($p) => $p->indikators->sum('realisasi'))) }}</span>
                    <span class="text-white/90 text-sm">Total Realisasi</span>
                </div>
            </div>
        </div>

    </div>
    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pegawai</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Indikator</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Realisasi</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KPI</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pegawais as $pegawai)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                <svg class="h-6 w-6 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $pegawai->nama }}</div>
                                <div class="text-xs text-gray-400 italic">
                                    {{ $pegawai->jabatan ?? 'Jabatan belum diisi' }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $pegawai->indikators->count() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ number_format($pegawai->indikators->sum('realisasi')) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $totalKpi = $pegawai->indikators->sum(fn($i) => $i->kpi_score['nilai']);
                            $avgKpi = $pegawai->indikators->count() > 0 ? round($totalKpi / $pegawai->indikators->count(), 1) : 0;
                        @endphp
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full
                            @if($avgKpi >= 8) bg-green-100 text-green-800
                            @elseif($avgKpi >= 5) bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ $avgKpi }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
