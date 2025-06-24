{{-- filepath: resources/views/admin/indikator/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Indikator</h2>
    <ul>
        <li>Pegawai: {{ $indikator->pegawai->nama ?? '-' }}</li>
        <li>Nama Indikator: {{ $indikator->nama_indikator }}</li>
        <li>Target: {{ $indikator->target }}</li>
        <li>Realisasi: {{ $indikator->realisasi }}</li>
    </ul>
    <a href="{{ route('admin.indikator.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection