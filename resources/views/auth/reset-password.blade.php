@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10 sm:p-12 welcome-card">
        <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">Atur Ulang Kata Sandi</h2>
        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" required autofocus
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                    value="{{ old('email', $request->email) }}">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Kata Sandi Baru</label>
                <input type="password" name="password" required
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="w-full btn btn-primary">
                Atur Ulang Kata Sandi
            </button>
        </form>
    </div>
</div>
@endsection
