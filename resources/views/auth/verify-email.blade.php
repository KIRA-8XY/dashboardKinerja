@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10 sm:p-12 welcome-card">
        <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">Verifikasi Email</h2>
        <div class="mb-4 text-sm text-gray-600 text-center">
            Terima kasih telah mendaftar! Sebelum mulai, silakan verifikasi alamat email Anda dengan mengklik link yang telah kami kirimkan ke email Anda.<br>
            Jika Anda belum menerima email, kami akan mengirimkan ulang.
        </div>
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                Link verifikasi baru telah dikirim ke email Anda.
            </div>
        @endif
        <div class="mt-4 flex flex-col items-center gap-2">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
