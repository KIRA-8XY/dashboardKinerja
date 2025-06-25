<x-guest-layout>
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 max-w-md w-full mx-auto transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
        <div class="text-center mb-8">
            <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Lupa</h2>
            <h3 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Kata Sandi
            </h3>
        </div>

        <p class="text-gray-600 text-center mb-6">
            Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang kata sandi.
        </p>

        @if (session('status'))
            <div class="mb-6 p-3 bg-green-50 text-green-600 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required autofocus
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    value="{{ old('email') }}" placeholder="email@contoh.com">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                    Kirim Link Reset Password
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Ingat kata sandi Anda?
            <a href="{{ route('login') }}" class="font-medium text-cyan-600 hover:text-cyan-500 hover:underline">
                Masuk di sini
            </a>
        </div>
    </div>
</x-guest-layout>
