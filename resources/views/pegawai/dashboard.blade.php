@extends('layouts.app')

@section('content')
    <h2>Halo, {{ $pegawai->nama }}</h2>
    <p>Berikut ini kinerja Anda:</p>
    <ul>
        @foreach ($indikators as $indikator)
            <li>
                <strong>{{ $indikator->nama_indikator }}</strong><br>
                Target: {{ $indikator->target }}<br>
                Realisasi: {{ $indikator->realisasi }}<br>
                <div class="progress mt-1" style="height: 10px;">
                    <div class="progress-bar bg-success" role="progressbar"
                         style="width: {{ min(100, ($indikator->realisasi / $indikator->target) * 100) }}%;">
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
