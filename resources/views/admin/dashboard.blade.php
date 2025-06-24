@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Dashboard Admin</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
        <div class="card-wrapper flex items-center gap-4">  
            <div class="p-3 rounded-full bg-cyan-100 text-cyan-600">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.9 4.024a9 9 0 01-13.779 13.78z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <span class="text-3xl font-bold text-gray-800">{{ $pegawais->count() }}</span>
                <p class="text-gray-600 text-sm">Total Pegawai</p>
            </div>
        </div>

        <div class="card-wrapper flex items-center gap-4">  
            <div class="p-3 rounded-full bg-emerald-100 text-emerald-600">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
            <div>
                <span class="text-3xl font-bold text-gray-800">{{ $pegawais->sum(fn($p) => $p->indikators->count()) }}</span>
                <p class="text-gray-600 text-sm">Total Indikator</p>
            </div>
        </div>

        <div class="card-wrapper flex items-center gap-4">  
            <div class="p-3 rounded-full bg-amber-100 text-amber-600">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <div>
                <span class="text-3xl font-bold text-gray-800">{{ number_format($pegawais->sum(fn($p) => $p->indikators->sum('realisasi'))) }}</span>
                <p class="text-gray-600 text-sm">Total Realisasi</p>
            </div>
        </div>

    </div>
    <div class="bg-white rounded-2xl card-wrapper p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Pegawai & Kinerja</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="even:bg-gray-50 hover:bg-gray-100 transition-colors duration-150">
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Indikator</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Total Realisasi</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Rata-rata KPI</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($pegawais as $pegawai)
                @php
                    $totalKpi = $pegawai->indikators->sum(fn($i) => $i->kpi_score['nilai']);
                    $avgKpi = count($pegawai->indikators) > 0 ? round($totalKpi / count($pegawai->indikators), 1) : 0;
                    $totalRealisasi = $pegawai->indikators->sum('realisasi');
                @endphp
                <tr class="even:bg-gray-50 hover:bg-gray-100 transition-colors duration-150">
                    <td class="px-4 py-2 font-semibold text-gray-700">{{ $pegawai->nama }}</td>
                    <td class="px-4 py-2 text-center text-gray-600">{{ $pegawai->indikators->count() }}</td>
                    <td class="px-4 py-2 text-center text-gray-600">{{ number_format($totalRealisasi) }}</td>
                    <td class="px-4 py-2 text-center">
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold transition-colors duration-150
                            @if($avgKpi >= 8) bg-green-100 text-green-700
                            @elseif($avgKpi >= 5) bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700 @endif
">
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
