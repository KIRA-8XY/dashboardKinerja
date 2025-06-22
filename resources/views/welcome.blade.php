<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kinerja</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #181f2a;
            color: #fff;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s, color 0.3s;
        }
        .welcome-card {
            background: #232b39;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.12);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 420px;
            width: 100%;
            text-align: center;
            transition: background 0.3s, color 0.3s;
        }
        .welcome-card h1 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
        }
        .welcome-card p {
            color: #bfc9db;
            margin-bottom: 2rem;
            font-size: 1rem;
        }
        .auth-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }
        .auth-links a {
            background: #fff;
            color: #232b39;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .auth-links a:hover {
            background: #f53003;
            color: #fff;
        }
        @media (max-width: 500px) {
            .welcome-card {
                padding: 1.5rem 0.7rem 1.2rem 0.7rem;
            }
            .welcome-card h1 {
                font-size: 1.1rem;
            }
        }
        /* Light mode support */
        @media (prefers-color-scheme: light) {
            body {
                background: #f4f6fb;
                color: #232b39;
            }
            .welcome-card {
                background: #fff;
                color: #232b39;
            }
            .welcome-card p {
                color: #4b5563;
            }
            .auth-links a {
                background: #232b39;
                color: #fff;
            }
            .auth-links a:hover {
                background: #f53003;
                color: #fff;
            }
        }
    </style>
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
