<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        {{-- 🧠 Ini adalah bagian header login/register/dashboard/logout --}}
        <x-header />

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Selamat Datang di Dashboard Kinerja</h1>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                <p class="text-gray-600 dark:text-gray-300">
                    Silakan login sebagai pegawai atau admin untuk memantau dan memperbarui kinerja.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
