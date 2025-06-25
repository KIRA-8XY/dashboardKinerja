{{-- filepath: resources/views/pegawai/riwayat-kinerja/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container animate-fade-up">
    <h2>Detail Riwayat Kinerja</h2>
    <ul>
        <li>Nama Indikator: {{ $riwayat->nama_indikator }}</li>
        <li>Target: {{ $riwayat->target }}</li>
        <li>Realisasi: {{ $riwayat->realisasi }}</li>
        <li>Bulan: {{ $riwayat->bulan }}</li>
        <li>Tahun: {{ $riwayat->tahun }}</li>
    </ul>
    <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection