{{-- filepath: resources/views/admin/pegawai/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pegawai</h2>
    <ul>
        <li>Nama: {{ $pegawai->nama }}</li>
        <li>Jabatan: {{ $pegawai->jabatan }}</li>
        <li>Target: {{ $pegawai->target }}</li>
        <li>Realisasi: {{ $pegawai->realisasi }}</li>
    </ul>
    <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection