@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard-pegawai.css') }}">
<div class="container-fluid" style="max-width: 950px; margin: 0 auto;">
    <div class="row mb-4">
        <div class="col-12">
            @php
                $totalKpi = $indikators->sum(fn($i) => $i->kpi_score['nilai']);
                $avgKpi = count($indikators) > 0 ? round($totalKpi / count($indikators), 1) : 0;
                // Tentukan warna badge rata-rata KPI pegawai
                if ($avgKpi >= 8) {
                    $avgKpiColor = 'kpi-badge-pegawai bg-success';
                } elseif ($avgKpi >= 5) {
                    $avgKpiColor = 'kpi-badge-pegawai bg-warning';
                } else {
                    $avgKpiColor = 'kpi-badge-pegawai bg-danger';
                }
            @endphp
            <div class="kinerja-header kinerja-header-rounded">
                <div class="info">
                    <span class="nama">{{ $pegawai->nama }}</span>
                    <span class="jabatan">{{ $pegawai->jabatan ?? 'Pegawai' }}</span>
                </div>
                <div class="{{ $avgKpiColor }}">
                    {{ $avgKpi }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="kinerja-table-card" style="border-radius: 0 0 18px 18px;">
                <table class="kinerja-table">
                    <thead>
                        <tr>
                            <th style="width:40px;">NO</th>
                            <th>INDIKATOR</th>
                            <th style="width:120px;">TARGET</th>
                            <th style="width:120px;">REALISASI</th>
                            <th style="width:120px;">% REALISASI</th>
                            <th style="width:80px;">KPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($indikators as $i => $indikator)
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
                                " style="border-radius: 8px;">
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
    </div>
</div>

<style>
.kinerja-header-rounded {
    border-radius: 28px !important;
}
.kpi-badge-pegawai {
    min-width: 70px;
    padding: 18px 0;
    font-size: 1.6rem;
    border-radius: 18px !important;
    font-weight: 700;
    text-align: center;
    box-shadow: 0 2px 8px rgba(35,41,70,0.04);
    border: 2px solid #e3e8ee;
    display: flex;
    align-items: center;
    justify-content: center;
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
</style>
@endsection
