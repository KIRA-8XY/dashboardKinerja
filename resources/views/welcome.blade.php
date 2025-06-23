<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kinerja</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    @if(Auth::check())
        <script>
            window.location.href = "{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('pegawai.dashboard') }}";
        </script>
    @endif
</head>
<body>
    <div class="welcome-card">
        <h1>Selamat Datang di Dashboard Kinerja</h1>
        <p>Silakan login sebagai pegawai atau admin untuk memantau dan memperbarui kinerja.</p>
        <div class="auth-links">
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
