{{-- filepath: resources/views/admin/indikator/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-6 text-gray-800">Detail Indikator</h2>
    <div class="space-y-3">
        <div>
            <span class="font-semibold text-gray-700">Pegawai:</span>
            <span class="text-gray-800">{{ $indikator->pegawai->nama ?? '-' }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Nama Indikator:</span>
            <span class="text-gray-800">{{ $indikator->nama_indikator }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Target:</span>
            <span class="text-gray-800">{{ number_format($indikator->target) }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">Realisasi:</span>
            <span class="text-gray-800">{{ number_format($indikator->realisasi) }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">% Realisasi:</span>
            <span class="text-gray-800">{{ number_format($indikator->persen_realisasi, 2) }}%</span>
        </div>
        <div>
            <span class="font-semibold text-gray-700">KPI:</span>
            <span class="inline-block px-3 py-1 rounded-full text-white font-bold
                @if($indikator->kpi_score['warna'] == 'bg-success') bg-green-500
                @elseif($indikator->kpi_score['warna'] == 'bg-warning') bg-yellow-500
                @else bg-red-500 @endif">
                {{ $indikator->kpi_score['nilai'] }}
            </span>
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('admin.indikator.index') }}" class="px-5 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Kembali</a>
    </div>
</div>
@endsection
