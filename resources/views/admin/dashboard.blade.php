@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Dashboard Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-50 rounded-xl p-6 shadow flex flex-col items-center">
            <span class="text-3xl font-bold text-blue-700">{{ $pegawais->count() }}</span>
            <span class="text-gray-600 mt-2">Total Pegawai</span>
        </div>
        <div class="bg-green-50 rounded-xl p-6 shadow flex flex-col items-center">
            <span class="text-3xl font-bold text-green-700">
                {{ $pegawais->sum(fn($p) => $p->indikators->count()) }}
            </span>
            <span class="text-gray-600 mt-2">Total Indikator</span>
        </div>
        <div class="bg-yellow-50 rounded-xl p-6 shadow flex flex-col items-center">
            <span class="text-3xl font-bold text-yellow-700">
                {{ number_format($pegawais->sum(fn($p) => $p->indikators->sum('realisasi'))) }}
            </span>
            <span class="text-gray-600 mt-2">Total Realisasi</span>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Pegawai & Kinerja</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
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
                <tr>
                    <td class="px-4 py-2 font-semibold text-gray-700">{{ $pegawai->nama }}</td>
                    <td class="px-4 py-2 text-center text-gray-600">{{ $pegawai->indikators->count() }}</td>
                    <td class="px-4 py-2 text-center text-gray-600">{{ number_format($totalRealisasi) }}</td>
                    <td class="px-4 py-2 text-center">
                        <span class="inline-block px-3 py-1 rounded-full text-white font-bold
                            @if($avgKpi >= 8) bg-green-500
                            @elseif($avgKpi >= 5) bg-yellow-500
                            @else bg-red-500 @endif">
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
