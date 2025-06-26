<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kinerja</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon-new.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon-new.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon-new.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('favicon-new.png') }}">
    <link rel="manifest" href="{{ asset('site-new.webmanifest') }}">
    <meta name="theme-color" content="#0e7490">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(20px);
            }
            to { 
                opacity: 1; 
                transform: translateY(0);
            }
        }
        .animate-fade-up {
            opacity: 0;
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
        }
        
        /* Smooth page load */
        body {
            opacity: 0;
            animation: fadeIn 0.5s ease-out 0.1s forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    @if(Auth::check())
        <script>
            window.location.href = "{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('pegawai.dashboard') }}";
        </script>
    @endif
</head>
<body class="bg-gradient-to-br from-cyan-900 to-blue-900 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 max-w-md w-full mx-auto transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl animate-fade-up">
        <div class="text-center mb-8">
            <div class="h-16 w-16 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang di</h1>
            <h2 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Dashboard Kinerja
            </h2>
        </div>
        
        <p class="text-gray-600 text-center mb-8 leading-relaxed">
            Silakan login sebagai pegawai atau admin untuk memantau dan memperbarui kinerja.
        </p>
        
        <div class="space-y-4">
            <a href="{{ route('login') }}" 
               class="block w-full px-6 py-3 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white font-medium rounded-lg text-center transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                Masuk ke Akun
            </a>
            <a href="{{ route('register') }}" 
               class="block w-full px-6 py-2.5 border-2 border-cyan-600 text-cyan-600 hover:bg-cyan-50 font-medium rounded-lg text-center transition-all duration-300 transform hover:-translate-y-0.5">
                Daftar Akun Baru
            </a>
        </div>
    </div>
</body>
</html>
