{{-- filepath: resources/views/admin/pegawai/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pegawai</h2>
    <form action="{{ route('admin.pegawai.update', $pegawai->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan }}">
        </div>
        <div class="mb-3">
            <label>Target</label>
            <input type="number" name="target" class="form-control" value="{{ $pegawai->target }}">
        </div>
        <div class="mb-3">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="form-control" value="{{ $pegawai->realisasi }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection