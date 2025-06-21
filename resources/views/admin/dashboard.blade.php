@extends('layouts.app')

@section('content')
    <h2>Dashboard Admin</h2>
    <div class="row">
        @foreach ($pegawais as $pegawai)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">{{ $pegawai->nama }}</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($pegawai->indikators as $indikator)
                                <li>
                                    <strong>{{ $indikator->nama_indikator }}</strong><br>
                                    Target: {{ $indikator->target }}<br>
                                    Realisasi: {{ $indikator->realisasi }}<br>
                                    <div class="progress mt-1" style="height: 10px;">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: {{ min(100, ($indikator->realisasi / $indikator->target) * 100) }}%;"
                                             aria-valuenow="{{ ($indikator->realisasi / $indikator->target) * 100 }}"
                                             aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
