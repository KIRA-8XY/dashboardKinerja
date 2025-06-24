<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kinerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #1a1a2e;
            color: white;
            padding: 20px;
        }

        .sidebar h4 {
            margin-bottom: 1.5rem;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .sidebar a:hover {
            background-color: #16213e;
        }

        .content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>Dashboard</h4>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Beranda Admin</a>
            <a href="{{ route('admin.pegawai.index') }}">Manajemen Pegawai</a>
            <a href="{{ route('admin.indikator.index') }}">Manajemen Indikator</a>
        @elseif(auth()->user()->role === 'pegawai')
            <a href="{{ route('pegawai.dashboard') }}">Profil Kinerja</a>
            <a href="{{ route('pegawai.indikator.index') }}">Indikator Saya</a>
            <a href="{{ route('pegawai.riwayat-kinerja.index') }}">Riwayat Kinerja</a>
        @endif
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Keluar
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
