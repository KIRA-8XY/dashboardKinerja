<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kinerja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts & Tailwind CSS CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r min-h-screen flex flex-col justify-between">
        <div>
            <div class="px-6 py-6 border-b">
                <span class="font-bold text-xl text-pink-700">Dashboard Kinerja</span>
            </div>
            <nav class="px-4 py-6 space-y-2 flex-1">
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-pink-50 text-gray-700 font-semibold">Dashboard</a>
                    <a href="{{ route('admin.pegawai.index') }}" class="block px-4 py-2 rounded hover:bg-pink-50 text-gray-700">Manajemen Pegawai</a>
                    <a href="{{ route('admin.indikator.index') }}" class="block px-4 py-2 rounded hover:bg-pink-50 text-gray-700">Manajemen Indikator</a>
                @elseif(auth()->user()->role === 'pegawai')
                    <a href="{{ route('pegawai.dashboard') }}" class="block px-4 py-2 rounded hover:bg-pink-50 text-gray-700 font-semibold">Profil Kinerja</a>
                    <a href="{{ route('pegawai.indikator.index') }}" class="block px-4 py-2 rounded hover:bg-pink-50 text-gray-700">Indikator Saya</a>
                    <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="block px-4 py-2 rounded hover:bg-pink-50 text-gray-700">Riwayat Kinerja</a>
                @endif
            </nav>
        </div>
        <div class="px-4 py-4 border-t sticky bottom-0">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full px-4 py-2 rounded bg-pink-600 text-white hover:bg-pink-700 font-semibold">Keluar</button>
            </form>
        </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-100 min-h-screen">
        @yield('content')
    </main>
</body>
</html>
