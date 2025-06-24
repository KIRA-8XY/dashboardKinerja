{{-- filepath: resources/views/admin/indikator/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Indikator</h2>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.indikator.create') }}" class="px-5 py-2 rounded bg-pink-600 text-white font-semibold shadow hover:bg-pink-700 transition whitespace-nowrap">Tambah Indikator</a>
            <span class="text-sm text-gray-600">Tampilan:</span>
            <form method="GET">
                <div class="relative">
                    <select name="mode" onchange="this.form.submit()" class="appearance-none bg-white border border-gray-300 text-sm rounded-lg pl-3 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm">
                        <option value="default" {{ $mode==='default' ? 'selected' : '' }}>Default</option>
                        <option value="pegawai" {{ $mode==='pegawai' ? 'selected' : '' }}>Group by Pegawai</option>
                        <option value="indikator" {{ $mode==='indikator' ? 'selected' : '' }}>Group by Indikator</option>
                        <option value="target_desc" {{ $mode==='target_desc' ? 'selected' : '' }}>Target Tertinggi</option>
                        <option value="target_asc" {{ $mode==='target_asc' ? 'selected' : '' }}>Target Terendah</option>
                        <option value="realisasi_desc" {{ $mode==='realisasi_desc' ? 'selected' : '' }}>Realisasi Tertinggi</option>
                        <option value="realisasi_asc" {{ $mode==='realisasi_asc' ? 'selected' : '' }}>Realisasi Terendah</option>
                    </select>
                    <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </form>
        </div>
    </div>
        <div class="bg-white rounded-xl shadow p-6 overflow-x-auto ring-1 ring-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="sticky top-0 bg-white">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pegawai</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Indikator</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Target</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Realisasi</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @if($grouped)
                    @foreach($grouped as $groupKey => $rows)
                        <tr class="bg-pink-50">
                            <td colspan="6" class="px-4 py-2 font-semibold text-pink-700">{{ $groupKey }}</td>
                        </tr>
                        @foreach($rows as $indikator)
                            <tr class="even:bg-gray-50 hover:bg-gray-100">
                                <td class="px-4 py-2 text-gray-700">{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-gray-700">{{ $indikator->pegawai->nama ?? '-' }}</td>
                                <td class="px-4 py-2 text-gray-700">{{ $indikator->nama_indikator }}</td>
                                <td class="px-4 py-2 text-center text-gray-600">{{ number_format($indikator->target) }}</td>
                                <td class="px-4 py-2 text-center text-gray-600">{{ number_format($indikator->realisasi) }}</td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('admin.indikator.edit', $indikator->id) }}" class="inline-block px-3 py-1 rounded bg-yellow-400 text-white font-semibold hover:bg-yellow-500 transition">Edit</a>
                                    <form action="{{ route('admin.indikator.destroy', $indikator->id) }}" method="POST" class="inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="inline-block px-3 py-1 rounded bg-red-500 text-white font-semibold hover:bg-red-600 transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($indikators as $i => $indikator)
                    <tr class="even:bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-2 text-gray-700">{{ $i+1 }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $indikator->pegawai->nama ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $indikator->nama_indikator }}</td>
                        <td class="px-4 py-2 text-center text-gray-600">{{ number_format($indikator->target) }}</td>
                        <td class="px-4 py-2 text-center text-gray-600">{{ number_format($indikator->realisasi) }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.indikator.edit', $indikator->id) }}" class="inline-block px-3 py-1 rounded bg-yellow-400 text-white font-semibold hover:bg-yellow-500 transition">Edit</a>
                            <form action="{{ route('admin.indikator.destroy', $indikator->id) }}" method="POST" class="inline delete-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-block px-3 py-1 rounded bg-red-500 text-white font-semibold hover:bg-red-600 transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection
