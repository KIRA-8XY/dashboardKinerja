@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10 sm:p-12 welcome-card">
        <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">Konfirmasi Kata Sandi</h2>
        <div class="mb-4 text-sm text-gray-600">
            Ini adalah area aman aplikasi. Silakan masukkan kata sandi Anda untuk melanjutkan.
        </div>
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Kata Sandi</label>
                <input type="password" name="password" required autocomplete="current-password"
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">
                Konfirmasi
            </button>
        </form>
    </div>
</div>
@endsection
