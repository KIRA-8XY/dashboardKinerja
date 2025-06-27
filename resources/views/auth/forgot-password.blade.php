<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-cyan-900 via-blue-900 to-blue-900">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-8 sm:p-12 mx-4 transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
            <div class="text-center mb-8">
                <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Lupa Kata Sandi?</h2>
                <p class="text-gray-600">Masukkan username Anda dan kami akan mengirimkan link untuk mereset kata sandi ke email yang terdaftar.</p>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-1">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                            class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent sm:text-sm transition duration-150 ease-in-out">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                        Kirim Link Reset Kata Sandi
                    </button>
                </div>
            </form>

            <div class="mt-6 flex items-center justify-center space-x-2 text-sm text-gray-600">
                <a href="{{ route('login') }}"
                   class="font-medium text-cyan-600 hover:text-cyan-500 transition duration-150 ease-in-out">
                    Kembali ke halaman login
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
