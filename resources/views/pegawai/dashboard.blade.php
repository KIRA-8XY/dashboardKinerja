@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Dashboard Kinerja Pegawai: {{ $pegawai->nama }}</h4>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kinerja Anda</h5>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Indikator</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>% Realisasi</th>
                        <th>KPI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($indikators as $i => $indikator)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $indikator->nama_indikator }}</td>
                        <td>{{ number_format($indikator->target) }}</td>
                        <td>{{ number_format($indikator->realisasi) }}</td>
                        <td>{{ number_format($indikator->persen_realisasi, 2) }}%</td>
                        <td>
                            <span class="badge {{ $indikator->kpi_score['warna'] }}">
                                {{ $indikator->kpi_score['nilai'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total skor KPI --}}
            @php
                $totalKpi = $indikators->sum(fn($i) => $i->kpi_score['nilai']);
                $avgKpi = count($indikators) > 0 ? round($totalKpi / count($indikators), 2) : 0;
            @endphp

            <div class="mt-4">
                <h5>Total Nilai KPI: <span class="badge bg-primary">{{ $avgKpi }}</span></h5>
            </div>
        </div>
    </div>
</div>
@endsection
