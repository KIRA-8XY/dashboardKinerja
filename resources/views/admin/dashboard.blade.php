@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<div class="admin-header admin-header-rounded">
    <span class="title">Dashboard Admin</span>
</div>

@foreach ($pegawais as $pegawai)
    @php
        $totalKpi = $pegawai->indikators->sum(fn($i) => $i->kpi_score['nilai']);
        $avgKpi = count($pegawai->indikators) > 0 ? round($totalKpi / count($pegawai->indikators), 1) : 0;

        if ($avgKpi >= 8) {
            $avgKpiColor = 'kpi-badge-pegawai bg-success';
        } elseif ($avgKpi >= 5) {
            $avgKpiColor = 'kpi-badge-pegawai bg-warning';
        } else {
            $avgKpiColor = 'kpi-badge-pegawai bg-danger';
        }
    @endphp
    <div class="pegawai-card">
        <div class="pegawai-card-header pegawai-card-header-minimal">
            <div class="info">
                <span class="nama">{{ $pegawai->nama }}</span>
                <span class="jabatan">Pegawai</span>
            </div>
            <div class="{{ $avgKpiColor }}">
                {{ $avgKpi }}
            </div>
        </div>
        <div style="padding:0 0 18px 0;">
            <table class="pegawai-table">
                <thead>
                    <tr>
                        <th class="th-center" style="width:40px; vertical-align:middle;">NO</th>
                        <th class="th-left" style="vertical-align:middle;">INDIKATOR</th>
                        <th class="th-right" style="width:110px; vertical-align:middle;">TARGET</th>
                        <th class="th-right" style="width:110px; vertical-align:middle;">REALISASI</th>
                        <th class="th-right" style="width:110px; vertical-align:middle;">
                            <div class="header-multiline">
                                <span>%</span>
                                <span>REALISASI</span>
                            </div>
                        </th>
                        <th class="th-center" style="width:70px; vertical-align:middle;">KPI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pegawai->indikators as $i => $indikator)
                    <tr>
                        <td class="td-center">{{ $i + 1 }}</td>
                        <td class="td-left">{{ $indikator->nama_indikator }}</td>
                        <td class="td-right">{{ number_format($indikator->target) }}</td>
                        <td class="td-right">{{ number_format($indikator->realisasi) }}</td>
                        <td class="td-right">
                            {{ number_format($indikator->persen_realisasi, 2) }}%
                        </td>
                        <td class="td-center">
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
.admin-header-rounded {
    border-radius: 28px !important;
}
.admin-header {
    border-radius: 28px !important;
    background: #fff;
    box-shadow: 0 2px 16px rgba(35,41,70,0.06);
    margin-bottom: 32px;
    min-height: 110px;
    display: flex;
    align-items: center;
    padding: 0 54px;
}
.admin-header .title {
    font-size: 2rem;
    font-weight: 700;
    color: #232946;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    height: 100%;
}
.pegawai-card {
    border-radius: 20px;
    border: 2px solid #e5eaf2;
    background: #fff;
    margin-bottom: 32px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(35,41,70,0.04);
}
.pegawai-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 28px 36px 18px 36px;
    border-bottom: none;
}
.pegawai-card-header-minimal {
    background: #111827 !important; /* Hitam modern */
    border-bottom: 1.5px solid #e3e8ee;
}
.pegawai-card-header-minimal .nama {
    color: #fff;
    font-weight: 700;
    letter-spacing: 0.2px;
}
.pegawai-card-header-minimal .jabatan {
    color: #cbd5e1;
}
.kpi-badge-pegawai {
    min-width: 72px;
    padding: 14px 0;
    font-size: 1.45rem;
    border-radius: 14px !important;
    font-weight: 700;
    text-align: center;
    box-shadow: 0 2px 8px rgba(35,41,70,0.04);
    border: 2px solid #e3e8ee;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-left: 24px;
    padding-right: 24px;
    background: #fff;
}
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
    background: #10b981 !important;
    color: #fff !important;
}
.bg-warning {
    background: #fbbf24 !important;
    color: #fff !important;
}
.bg-danger {
    background: #ef4444 !important;
    color: #fff !important;
}
.pegawai-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 1.08rem;
    margin-bottom: 0;
}
.pegawai-table th, .pegawai-table td {
    padding: 16px 10px;
    font-size: 1.08rem;
}
.pegawai-table thead th {
    background: #eaf1fb;
    color: #232946;
    font-weight: 700;
    border-bottom: 2px solid #d1e0f7;
    letter-spacing: 0.5px;
    font-size: 1.13rem;
    vertical-align: middle;
    height: 56px;
}
.header-multiline {
    display: flex;
    flex-direction: column;
    align-items: center;
    line-height: 1.1;
    justify-content: center;
    height: 100%;
}
.th-center { text-align: center !important; }
.th-left { text-align: left !important; }
.th-right { text-align: right !important; }
.td-center { text-align: center !important; }
.td-left { text-align: left !important; }
.td-right { text-align: right !important; }
.pegawai-table tr:not(:last-child) td {
    border-bottom: 1px solid #f1f1f1;
}
.pegawai-table td {
    color: #232946;
    background: #fff;
    vertical-align: middle;
    height: 54px;
}
</style>
@endsection
