{{-- filepath: resources/views/pegawai/indikator/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Indikator Saya</h2>
    <a href="{{ route('pegawai.indikator.create') }}" class="btn btn-primary mb-3">Tambah Indikator</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
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
                <td>{{ $indikator->nama_indikator }}</td>
                <td>{{ $indikator->target }}</td>
                <td>{{ $indikator->realisasi }}</td>
                <td>
                    <a href="{{ route('pegawai.indikator.edit', $indikator->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pegawai.indikator.destroy', $indikator->id) }}" method="POST" style="display:inline;">
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