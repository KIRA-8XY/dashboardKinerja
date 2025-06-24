{{-- filepath: resources/views/admin/pegawai/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pegawai</h2>
    <form action="{{ route('admin.pegawai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control">
        </div>
        <div class="mb-3">
            <label>Target</label>
            <input type="number" name="target" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="form-control" value="0">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection