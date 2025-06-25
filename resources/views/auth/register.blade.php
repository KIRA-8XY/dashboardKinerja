<x-guest-layout>
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 max-w-md w-full mx-auto transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
        <div class="text-center mb-8">
            <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun</h2>
            <h3 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Baru
            </h3>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" required autofocus value="{{ old('name') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="Nama Anda">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="email@contoh.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••">
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                    Daftar Sekarang
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-medium text-cyan-600 hover:text-cyan-500 hover:underline">
                Masuk di sini
            </a>
        </div>
    </div>
</x-guest-layout>
