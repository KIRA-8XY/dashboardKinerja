<x-guest-layout>
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 max-w-md w-full mx-auto transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
        <div class="text-center mb-8">
            <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Atur Ulang</h2>
            <h3 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Kata Sandi
            </h3>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required autofocus
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    value="{{ old('email', $request->email) }}" placeholder="email@contoh.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••">
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                    Atur Ulang Kata Sandi
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
