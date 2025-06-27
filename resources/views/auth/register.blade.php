<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-cyan-900 via-blue-900 to-blue-900">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-8 sm:p-12 mx-4 transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
            <div class="text-center mb-8">
                <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun</h2>
                <h1 class="text-3xl font-extrabold bg-clip-text text-transparent">
                    Dashboard Kinerja
                </h1>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-1">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                            class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent sm:text-sm transition duration-150 ease-in-out">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" required
                            class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent sm:text-sm transition duration-150 ease-in-out">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                        Simpan Password Baru
                    </button>
                </div>
            </form>

            <div class="mt-6 flex items-center justify-center space-x-2 text-sm text-gray-600">
                <span>Sudah punya akun?</span>
                <a href="{{ route('login') }}"
                   class="font-medium text-cyan-600 hover:text-cyan-500 transition duration-150 ease-in-out">
                    Masuk di sini
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
