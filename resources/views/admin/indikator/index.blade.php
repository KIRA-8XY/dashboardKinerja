{{-- filepath: resources/views/admin/indikator/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Indikator</h2>
    <a href="{{ route('admin.indikator.create') }}" class="btn btn-primary mb-3">Tambah Indikator</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Pegawai</th>
                <th>Nama Indikator</th>
                <th>Target</th>
                <th>Realisasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($indikators as $i => $indikator)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $indikator->pegawai->nama ?? '-' }}</td>
                <td>{{ $indikator->nama_indikator }}</td>
                <td>{{ $indikator->target }}</td>
                <td>{{ $indikator->realisasi }}</td>
                <td>
                    <a href="{{ route('admin.indikator.edit', $indikator->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.indikator.destroy', $indikator->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection