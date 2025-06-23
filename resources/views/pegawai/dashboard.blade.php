@extends('layouts.app')

@section('content')
    <h2>Halo, {{ $pegawai->nama }}</h2>

    <p>Berikut ini kinerja Anda saat ini:</p>
    <ul>
        @foreach ($indikators as $indikator)
            <li>
                <strong>{{ $indikator->nama_indikator }}</strong><br>
                Target: {{ $indikator->target }}<br>
                Realisasi: {{ $indikator->realisasi }}<br>
                <div class="progress mt-1" style="height: 10px;">
                    <div class="progress-bar bg-success" role="progressbar"
                         style="width: {{ min(100, ($indikator->target > 0 ? ($indikator->realisasi / $indikator->target) * 100 : 0)) }}%;">
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <hr>

    <h3>Riwayat Kinerja Bulanan</h3>
    @if ($riwayatKinerjas->isEmpty())
        <p>Belum ada data riwayat kinerja bulanan.</p>
    @else
        <ul>
            @foreach ($riwayatKinerjas as $riwayat)
                <li>
                    <strong>{{ $riwayat->nama_indikator }} ({{ $riwayat->bulan }}/{{ $riwayat->tahun }})</strong><br>
                    Target: {{ $riwayat->target }} | Realisasi: {{ $riwayat->realisasi }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection
