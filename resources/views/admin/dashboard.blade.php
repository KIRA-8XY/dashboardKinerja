@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<div class="admin-header">
    <span class="title">Dashboard Admin</span>
</div>

@foreach ($pegawais as $pegawai)
    @php
        $totalKpi = $pegawai->indikators->sum(fn($i) => $i->kpi_score['nilai']);
        $avgKpi = count($pegawai->indikators) > 0 ? round($totalKpi / count($pegawai->indikators), 1) : 0;

        // Tentukan warna badge rata-rata KPI pegawai
        if ($avgKpi >= 8) {
            $avgKpiColor = 'kpi-badge-pegawai bg-success';
        } elseif ($avgKpi >= 5) {
            $avgKpiColor = 'kpi-badge-pegawai bg-warning';
        } else {
            $avgKpiColor = 'kpi-badge-pegawai bg-danger';
        }
    @endphp
    <div class="pegawai-card">
        <div class="pegawai-card-header">
            <div class="info">
                <span class="nama">{{ $pegawai->nama }}</span>
                <span class="jabatan">{{ $pegawai->jabatan ?? 'Pegawai' }}</span>
            </div>
            <div class="{{ $avgKpiColor }}">
                {{ $avgKpi }}
            </div>
        </div>
        <div style="padding:0 0 18px 0;">
            <table class="pegawai-table">
                <thead>
                    <tr>
                        <th style="width:40px;">NO</th>
                        <th>INDIKATOR</th>
                        <th style="width:110px;">TARGET</th>
                        <th style="width:110px;">REALISASI</th>
                        <th style="width:110px;">% REALISASI</th>
                        <th style="width:70px;">KPI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pegawai->indikators as $i => $indikator)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td style="text-align:left;">{{ $indikator->nama_indikator }}</td>
                        <td>{{ number_format($indikator->target) }}</td>
                        <td>{{ number_format($indikator->realisasi) }}</td>
                        <td>
                            {{ number_format($indikator->persen_realisasi, 2) }}%
                        </td>
                        <td>
                            <span class="kpi-badge
                                @if($indikator->kpi_score['warna'] == 'bg-success') bg-success
                                @elseif($indikator->kpi_score['warna'] == 'bg-warning') bg-warning
                                @else bg-danger
                                @endif
                            ">
                                {{ $indikator->kpi_score['nilai'] }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:#e74c3c; font-weight:500; background: #fff;">Data belum tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endforeach

<style>
/* Tambahan style untuk badge KPI agar lebih terlihat */
.kpi-badge {
    display: inline-block;
    min-width: 36px;
    padding: 6px 0;
    border-radius: 6px;
    font-weight: 700;
    font-size: 1rem;
    letter-spacing: 0.5px;
    text-align: center;
    border: none;
}
.bg-success {
    background: #22c55e !important;
    color: #fff !important;
}
.bg-warning {
    background: #facc15 !important;
    color: #fff !important;
}
.bg-danger {
    background: #ef4444 !important;
    color: #fff !important;
}
/* Badge rata-rata KPI pegawai */
.kpi-badge-pegawai {
    min-width: 48px;
    padding: 10px 0;
    font-size: 1.2rem;
    border-radius: 8px;
    font-weight: 700;
    text-align: center;
    box-shadow: 0 2px 8px rgba(35,41,70,0.04);
    border: 1.5px solid #e3e8ee;
}
</style>
@endsection
