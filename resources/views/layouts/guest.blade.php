<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard Kinerja</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon-new.svg') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon-new.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon-new.ico') }}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ asset('favicon-new.png') }}">
        <link rel="manifest" href="{{ asset('site-new.webmanifest') }}">
        <meta name="theme-color" content="#0e7490">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
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
            html {
                opacity: 0;
                animation: fadeIn 0.5s ease-out 0.1s forwards;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100 min-h-screen">
        <div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-cyan-50 to-blue-50">
            <div class="w-full max-w-md animate-fade-up">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
