<x-guest-layout>
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 max-w-md w-full mx-auto transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
        <div class="text-center mb-8">
            <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Verifikasi</h2>
            <h3 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Email Anda
            </h3>
        </div>

        <div class="text-center mb-8">
            <p class="text-gray-600 mb-6">
                Terima kasih telah mendaftar! Sebelum mulai, silakan verifikasi alamat email Anda dengan mengklik link yang telah kami kirimkan ke email Anda.<br>
                Jika Anda belum menerima email, kami akan mengirimkan ulang.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 p-3 bg-green-50 text-green-600 rounded-lg text-sm text-center">
                Link verifikasi baru telah dikirim ke email Anda.
            </div>
        @endif

        <div class="mt-6 flex flex-col items-center space-y-4">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="text-sm font-medium text-cyan-600 hover:text-cyan-500 hover:underline focus:outline-none transition-all duration-200">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
