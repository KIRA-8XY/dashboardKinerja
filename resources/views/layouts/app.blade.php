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
        /* Cyan theme overrides for existing pink utility classes */
        /* ---------- Table polish ---------- */
        table thead th{background-color:#f8fafc;font-weight:600}
        table tbody tr:hover{background-color:#f1f5f9}
        /* Remove duplicate card wrappers padding fix */
        .card-wrapper{background:#fff;border-radius:1rem;box-shadow:0 1px 2px rgba(0,0,0,0.05);padding:1.5rem}
        /* Utility button classes for future use */
        .btn{display:inline-block;border-radius:9999px;padding:0.375rem 1rem;font-weight:600;transition:background-color .15s}
        .btn-primary{background-color:#0891b2;color:#fff}
        .btn-primary:hover{background-color:#0e7490}
        .btn-danger{background-color:transparent;color:#dc2626;border:1px solid #ef4444;font-size:0.875rem;padding:0.25rem 0.75rem}
        .btn-danger:hover{background-color:#ef4444;color:#fff}
        .btn-warning{background-color:transparent;color:#ca8a04;border:1px solid #facc15;font-size:0.875rem;padding:0.25rem 0.75rem}
        .btn-warning:hover{background-color:#facc15;color:#000}
        .bg-pink-600{background-color:#0891b2!important}
        .bg-pink-700{background-color:#0e7490!important}
        .hover\:bg-pink-700:hover{background-color:#0e7490!important}
        .hover\:bg-pink-600:hover{background-color:#0891b2!important}
        .text-pink-700{color:#0e7490!important}
        .text-pink-600{color:#0891b2!important}
        .bg-pink-100{background-color:#cffafe!important;color:#0e7490!important}
        .bg-pink-50{background-color:#ecfeff!important}
        .hover\:bg-pink-50:hover{background-color:#ecfeff!important}
        .hover\:bg-pink-100:hover{background-color:#cffafe!important}
        .focus\:ring-pink-400:focus{box-shadow:0 0 0 2px #22d3ee!important}
        .focus\:border-pink-400:focus{border-color:#22d3ee!important}
        .ring-pink-400{--tw-ring-color:#22d3ee!important}
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    @if(auth()->check())
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r min-h-screen flex flex-col justify-between">
            <div>
                <div class="px-6 py-6 border-b">
                    <span class="font-bold text-xl text-pink-700">Dashboard Kinerja</span>
                </div>
                <nav class="px-4 py-6 space-y-2 flex-1">
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-pink-100 text-pink-700 font-semibold' : 'hover:bg-pink-50 text-gray-700' }}">Dashboard</a>
                        <a href="{{ route('admin.pegawai.index') }}" class="block px-4 py-2 rounded {{ request()->routeIs('admin.pegawai.*') ? 'bg-pink-100 text-pink-700 font-semibold' : 'hover:bg-pink-50 text-gray-700' }}">Manajemen Pegawai</a>
                        <a href="{{ route('admin.indikator.index') }}" class="block px-4 py-2 rounded {{ request()->routeIs('admin.indikator.*') ? 'bg-pink-100 text-pink-700 font-semibold' : 'hover:bg-pink-50 text-gray-700' }}">Manajemen Indikator</a>
                    @elseif(auth()->user()->role === 'pegawai')
                        <a href="{{ route('pegawai.dashboard') }}" class="block px-4 py-2 rounded {{ request()->routeIs('pegawai.dashboard') ? 'bg-pink-100 text-pink-700 font-semibold' : 'hover:bg-pink-50 text-gray-700' }}">Profil Kinerja</a>
                        <a href="{{ route('pegawai.indikator.index') }}" class="block px-4 py-2 rounded {{ request()->routeIs('pegawai.indikator.*') ? 'bg-pink-100 text-pink-700 font-semibold' : 'hover:bg-pink-50 text-gray-700' }}">Indikator Saya</a>
                        <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="block px-4 py-2 rounded {{ request()->routeIs('pegawai.riwayat-kinerja.*') ? 'bg-pink-100 text-pink-700 font-semibold' : 'hover:bg-pink-50 text-gray-700' }}">Riwayat Kinerja</a>
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
    @endif

    <!-- Main Content -->
    <main class="@if(auth()->check()) flex-1 p-8 bg-gray-100 min-h-screen @else flex items-center justify-center min-h-screen w-full @endif">
        @yield('content')
    </main>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('form.delete-form').forEach((form) => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Hapus data?',
                        text: 'Data yang dihapus tidak dapat dikembalikan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e3342f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
