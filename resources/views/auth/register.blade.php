<x-guest-layout>
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 transition-all duration-300 hover:shadow-3xl hover:-translate-y-1 hover:ring-2 hover:ring-cyan-100">
        <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">Daftar Akun Baru</h2>
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Nama</label>
                <input type="text" name="name" required autofocus value="{{ old('name') }}"
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Kata Sandi</label>
                <input type="password" name="password" required
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required
                    class="w-full rounded border border-gray-300 bg-white text-gray-900 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>
            <button type="submit"
                class="w-full px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Daftar</button>
        </form>
        <div class="mt-8 text-center text-sm text-gray-700">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-cyan-600 hover:underline">Masuk di sini</a>
        </div>
    </div>
</x-guest-layout>
