{{-- filepath: resources/views/admin/indikator/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Indikator</h2>
    <form action="{{ route('admin.indikator.update', $indikator->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}" {{ $indikator->pegawai_id == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Indikator</label>
            <input type="text" name="nama_indikator" class="form-control" value="{{ $indikator->nama_indikator }}" required>
        </div>
        <div class="mb-3">
            <label>Target</label>
            <input type="number" name="target" class="form-control" value="{{ $indikator->target }}" required>
        </div>
        <div class="mb-3">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="form-control" value="{{ $indikator->realisasi }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.indikator.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection