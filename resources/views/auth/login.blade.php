<x-guest-layout>
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 max-w-md w-full mx-auto transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
        <div class="text-center mb-8">
            <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Masuk ke</h2>
            <h3 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Akun Anda
            </h3>
        </div>

        @if(session('status'))
            <div class="mb-6 p-3 bg-red-50 text-red-600 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required autofocus
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    value="{{ old('email') }}" placeholder="email@contoh.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                </div>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Ingat saya
                    </label>
                </div>
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-cyan-600 hover:text-cyan-500">
                        Lupa kata sandi?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                    Masuk ke Akun
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="font-medium text-cyan-600 hover:text-cyan-500 hover:underline">
                Daftar di sini
            </a>
        </div>
    </div>
</x-guest-layout>
