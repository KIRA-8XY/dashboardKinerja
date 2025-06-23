@extends('layouts.app')

@section('content')
<h2>Riwayat Kinerja Bulan {{ $bulan }}/{{ $tahun }}</h2>

<form method="GET" action="{{ route('pegawai.kinerja') }}">
    <select name="bulan">
        @foreach(range(1, 12) as $b)
            <option value="{{ $b }}" {{ $b == $bulan ? 'selected' : '' }}>
                {{ DateTime::createFromFormat('!m', $b)->format('F') }}
            </option>
        @endforeach
    </select>

    <select name="tahun">
        @for ($t = 2023; $t <= now()->year; $t++)
            <option value="{{ $t }}" {{ $t == $tahun ? 'selected' : '' }}>{{ $t }}</option>
        @endfor
    </select>

    <button type="submit">Lihat</button>
</form>

<ul class="mt-4">
    @forelse ($riwayat as $r)
        <li>
            <strong>{{ $r->nama_indikator }}</strong><br>
            Target: {{ $r->target }} | Realisasi: {{ $r->realisasi }}
        </li>
    @empty
        <li>Data belum tersedia.</li>
    @endforelse
</ul>
@endsection
