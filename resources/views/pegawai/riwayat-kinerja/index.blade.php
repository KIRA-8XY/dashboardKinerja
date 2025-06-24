{{-- filepath: resources/views/pegawai/riwayat-kinerja/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Kinerja</h2>
    <a href="{{ route('pegawai.riwayat-kinerja.create') }}" class="btn btn-primary mb-3">Tambah Riwayat</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Indikator</th>
                <th>Target</th>
                <th>Realisasi</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayats as $i => $riwayat)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $riwayat->nama_indikator }}</td>
                <td>{{ $riwayat->target }}</td>
                <td>{{ $riwayat->realisasi }}</td>
                <td>{{ $riwayat->bulan }}</td>
                <td>{{ $riwayat->tahun }}</td>
                <td>
                    <a href="{{ route('pegawai.riwayat-kinerja.edit', $riwayat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pegawai.riwayat-kinerja.destroy', $riwayat->id) }}" method="POST" style="display:inline;">
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