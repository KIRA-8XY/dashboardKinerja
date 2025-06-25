@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-extrabold mb-4 text-gray-800">Dashboard Pegawai</h1>
    <div class="flex items-center gap-4 p-4 mb-6 bg-cyan-50 rounded-xl shadow-inner">
        <div class="h-12 w-12 rounded-full bg-cyan-100 flex items-center justify-center text-2xl">👋</div>
        <div>
            <p class="text-lg text-gray-700">Halo,</p>
            <p class="text-xl font-semibold text-gray-800">{{ $pegawai->nama }}</p>
        </div>
    </div>
    @php
    $totalKpi = $indikators->sum(fn($i) => $i->kpi_score['nilai']);
    $avgKpi = count($indikators) > 0 ? round($totalKpi / count($indikators), 1) : 0;
@endphp
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
        <!-- Total Indikator -->
        <div class="relative p-6 rounded-xl text-white shadow-lg bg-gradient-to-br from-cyan-500 to-sky-600 overflow-hidden">
            <div class="absolute right-3 bottom-3 opacity-30">
                <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
            <span class="text-4xl font-extrabold">{{ $indikators->count() }}</span>
            <p class="mt-2 text-sm font-medium">Total Indikator</p>
        </div>

        <!-- Total Realisasi -->
        <div class="relative p-6 rounded-xl text-white shadow-lg bg-gradient-to-br from-emerald-500 to-green-600 overflow-hidden">
            <div class="absolute right-3 bottom-3 opacity-30">
                <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span class="text-4xl font-extrabold">{{ number_format($indikators->sum('realisasi')) }}</span>
            <p class="mt-2 text-sm font-medium">Total Realisasi</p>
        </div>

        <!-- Rata-rata KPI -->
        <div class="relative p-6 rounded-xl text-white shadow-lg bg-gradient-to-br from-amber-400 to-yellow-500 overflow-hidden">
            <div class="absolute right-3 bottom-3 opacity-30">
                <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-4xl font-extrabold">{{ $avgKpi }}</span>
            <p class="mt-2 text-sm font-medium">Rata-rata KPI</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Indikator Saya</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Indikator</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Target</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Realisasi</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">% Realisasi</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">KPI</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($indikators as $indikator)
                <tr>
                    <td class="px-4 py-2 text-gray-700">{{ $indikator->nama_indikator }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ number_format($indikator->target) }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ number_format($indikator->realisasi) }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ number_format($indikator->persen_realisasi, 2) }}%</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold transition-colors duration-150
                            @if($indikator->kpi_score['warna'] == 'bg-success') bg-green-100 text-green-700
                            @elseif($indikator->kpi_score['warna'] == 'bg-warning') bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ $indikator->kpi_score['nilai'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
