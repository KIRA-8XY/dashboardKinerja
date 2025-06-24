{{-- filepath: resources/views/pegawai/riwayat-kinerja/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Riwayat Kinerja</h2>
    <form action="{{ route('pegawai.riwayat-kinerja.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Indikator</label>
            <input type="text" name="nama_indikator" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Target</label>
            <input type="number" name="target" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Bulan</label>
            <select name="bulan" class="form-control" required>
                @foreach(range(1,12) as $b)
                    <option value="{{ $b }}">{{ DateTime::createFromFormat('!m', $b)->format('F') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ now()->year }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection