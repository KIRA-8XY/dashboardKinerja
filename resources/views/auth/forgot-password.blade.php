@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10 sm:p-12 welcome-card">
        <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">Lupa Kata Sandi</h2>
        <div class="mb-4 text-sm text-gray-600">
            Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang kata sandi.
        </div>
        @if (session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" required autofocus
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">
                Kirim Link Reset
            </button>
        </form>
        <div class="mt-8 text-center text-sm">
            <a href="{{ route('login') }}" class="text-cyan-600 hover:underline">Kembali ke Login</a>
        </div>
    </div>
</div>
@endsection
