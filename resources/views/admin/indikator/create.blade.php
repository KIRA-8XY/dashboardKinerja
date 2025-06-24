{{-- filepath: resources/views/admin/indikator/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Indikator</h2>
    <form action="{{ route('admin.indikator.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                <option value="">Pilih Pegawai</option>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                @endforeach
            </select>
        </div>
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
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.indikator.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection