@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Halo, {{ $pegawai->nama }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-50 rounded-xl p-6 shadow flex flex-col items-center">
            <span class="text-3xl font-bold text-blue-700">{{ $indikators->count() }}</span>
            <span class="text-gray-600 mt-2">Total Indikator</span>
        </div>
        <div class="bg-green-50 rounded-xl p-6 shadow flex flex-col items-center">
            <span class="text-3xl font-bold text-green-700">{{ $indikators->sum('realisasi') }}</span>
            <span class="text-gray-600 mt-2">Total Realisasi</span>
        </div>
        <div class="bg-yellow-50 rounded-xl p-6 shadow flex flex-col items-center">
            @php
                $totalKpi = $indikators->sum(fn($i) => $i->kpi_score['nilai']);
                $avgKpi = count($indikators) > 0 ? round($totalKpi / count($indikators), 1) : 0;
            @endphp
            <span class="text-3xl font-bold text-yellow-700">{{ $avgKpi }}</span>
            <span class="text-gray-600 mt-2">Rata-rata KPI</span>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
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
                        <span class="inline-block px-3 py-1 rounded-full text-white font-bold
                            @if($indikator->kpi_score['warna'] == 'bg-success') bg-green-500
                            @elseif($indikator->kpi_score['warna'] == 'bg-warning') bg-yellow-500
                            @else bg-red-500 @endif">
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
