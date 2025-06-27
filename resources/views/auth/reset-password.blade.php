<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-cyan-900 via-blue-900 to-blue-900">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-8 sm:p-12 mx-4 transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
            <div class="text-center mb-8">
                <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Reset Kata Sandi</h2>
                <p class="text-gray-600">Masukkan kata sandi baru Anda</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                            class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent sm:text-sm transition duration-150 ease-in-out">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                    <div class="mt-1">
                        <input type="password" name="password" required
                            class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent sm:text-sm transition duration-150 ease-in-out">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi Baru</label>
                    <div class="mt-1">
                        <input type="password" name="password_confirmation" required
                            class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent sm:text-sm transition duration-150 ease-in-out">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                        Reset Kata Sandi
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
