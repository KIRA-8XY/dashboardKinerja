@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard-pegawai.css') }}">
<div class="container-fluid" style="max-width: 1200px; margin: 0 auto;">
    <div class="row mb-4">
        <div class="col-12">
            @php
                $totalKpi = $indikators->sum(fn($i) => $i->kpi_score['nilai']);
                $avgKpi = count($indikators) > 0 ? round($totalKpi / count($indikators), 1) : 0;
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
            <div class="kinerja-table-card" style="border-radius: 28px;">
                <div style="overflow-x:auto;">
                <table class="kinerja-table">
                    <thead>
                        <tr>
                            <th style="width:60px;">NO</th>
                            <th style="min-width:260px;">INDIKATOR</th>
                            <th style="width:150px;">TARGET</th>
                            <th style="width:150px;">REALISASI</th>
                            <th style="width:150px;">% REALISASI</th>
                            <th style="width:90px;">KPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($indikators as $i => $indikator)
                        <tr>
                            <td style="text-align:center;">{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $indikator->nama_indikator }}</td>
                            <td style="text-align:right;">{{ number_format($indikator->target) }}</td>
                            <td style="text-align:right;">{{ number_format($indikator->realisasi) }}</td>
                            <td style="text-align:right;">
                                {{ number_format($indikator->persen_realisasi, 2) }}%
                            </td>
                            <td style="text-align:center;">
                                <span class="kpi-badge
                                    @if($indikator->kpi_score['warna'] == 'bg-success') bg-success
                                    @elseif($indikator->kpi_score['warna'] == 'bg-warning') bg-warning
                                    @else bg-danger
                                    @endif
                                " style="border-radius: 10px;">
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
</div>

<style>
body {
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
    background: #f5f7fa;
}
.kinerja-header-rounded {
    border-radius: 28px !important;
}
.kinerja-header {
    border-radius: 28px !important;
    padding: 36px 40px 28px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    box-shadow: 0 2px 16px rgba(35,41,70,0.06);
    margin-bottom: 0;
}
.kinerja-header .info .nama {
    font-size: 2rem;
    font-weight: 700;
    color: #232946;
    letter-spacing: 0.5px;
}
.kinerja-header .info .jabatan {
    font-size: 1.15rem;
    color: #8b94a9;
    font-weight: 500;
    margin-top: 2px;
}
.kpi-badge-pegawai {
    min-width: 80px;
    padding: 18px 0;
    font-size: 2rem;
    border-radius: 18px !important;
    font-weight: 700;
    text-align: center;
    box-shadow: 0 2px 8px rgba(35,41,70,0.04);
    border: 2px solid #e3e8ee;
    display: flex;
    align-items: center;
    justify-content: center;
}
.kinerja-table-card {
    border-radius: 0 0 28px 28px !important;
    background: #fff;
    box-shadow: 0 2px 16px rgba(35,41,70,0.04);
    margin-top: 0;
    overflow: hidden;
    border: none;
}
.kinerja-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 1.15rem;
}
.kinerja-table th, .kinerja-table td {
    padding: 18px 14px;
    font-size: 1.08rem;
    vertical-align: middle;
}
.kinerja-table th {
    background: #e0e7ef;
    font-weight: 700;
    color: #232946;
    border-bottom: 2.5px solid #b6c3d1;
    letter-spacing: 0.5px;
    text-align: center;
    font-size: 1.13rem;
    /* Simetris: rata tengah semua header */
}
.kinerja-table th,
.kinerja-table td {
    text-align: center;
}
.kinerja-table th:nth-child(2),
.kinerja-table td:nth-child(2) {
    text-align: left;
}
.kinerja-table th:nth-child(3),
.kinerja-table th:nth-child(4),
.kinerja-table th:nth-child(5),
.kinerja-table td:nth-child(3),
.kinerja-table td:nth-child(4),
.kinerja-table td:nth-child(5) {
    text-align: right;
}
.kinerja-table th:last-child,
.kinerja-table td:last-child {
    text-align: center;
}
.kinerja-table tr:not(:last-child) td {
    border-bottom: 1px solid #f1f1f1;
}
.kinerja-table td {
    color: #232946;
    background: #fff;
}
.kpi-badge {
    display: inline-block;
    min-width: 44px;
    padding: 10px 0;
    border-radius: 10px !important;
    font-weight: 700;
    font-size: 1.13rem;
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
@media (max-width: 900px) {
    .container-fluid { max-width: 100vw !important; }
    .kinerja-header, .kinerja-table-card { padding: 10px 4px; }
    .kinerja-header { flex-direction: column; align-items: flex-start; gap: 10px; }
    .kinerja-header .kpi-badge-pegawai { align-self: flex-end; }
    .kinerja-table th, .kinerja-table td { font-size: 0.98rem; padding: 8px 4px; }
    .kinerja-table th { font-size: 1rem; }
}
</style>
@endsection
