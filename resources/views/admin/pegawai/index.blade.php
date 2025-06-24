{{-- filepath: resources/views/admin/pegawai/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pegawai</h2>
    <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Target</th>
                <th>Realisasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $i => $pegawai)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->jabatan }}</td>
                <td>{{ $pegawai->target }}</td>
                <td>{{ $pegawai->realisasi }}</td>
                <td>
                    <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
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