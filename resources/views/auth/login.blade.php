<x-guest-layout>
<div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 transition-all duration-300 hover:shadow-3xl hover:-translate-y-1 hover:ring-2 hover:ring-cyan-100">
    <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">Masuk ke Akun Anda</h2>
    @if(session('status'))
        <div class="mb-4 text-red-500">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
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
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Kata Sandi</label>
            <input type="password" name="password" required
                class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <label class="flex items-center text-gray-700">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-sm">Ingat saya</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-cyan-600 hover:underline">Lupa kata sandi?</a>
        </div>
        <button type="submit"
            class="w-full px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Masuk</button>
    </form>
    <div class="mt-8 text-center text-sm text-gray-700">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-cyan-600 hover:underline">Daftar di sini</a>
    </div>
</div>
</x-guest-layout>
