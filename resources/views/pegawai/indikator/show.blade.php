{{-- filepath: resources/views/pegawai/indikator/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Indikator</h2>
    <ul>
        <li>Nama Indikator: {{ $indikator->nama_indikator }}</li>
        <li>Target: {{ $indikator->target }}</li>
        <li>Realisasi: {{ $indikator->realisasi }}</li>
    </ul>
    <a href="{{ route('pegawai.indikator.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection