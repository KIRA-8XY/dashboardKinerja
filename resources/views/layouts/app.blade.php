<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kinerja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts & Tailwind CSS CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Manrope', sans-serif; }
        /* Cyan theme overrides for existing pink utility classes */
        /* ---------- Table polish ---------- */
        table thead th{background-color:#f8fafc;font-weight:600}
        table tbody tr:hover{background-color:#f1f5f9}
        /* Remove duplicate card wrappers padding fix */
        .card-wrapper{background:#fff;border-radius:1rem;box-shadow:0 1px 2px rgba(0,0,0,0.05);padding:1.5rem}
        /* Utility button classes for future use */
        /* Pagination styling */
        nav[role="navigation"] a,
        nav[role="navigation"] span[aria-current="page"]{display:inline-flex;align-items:center;justify-content:center;width:2.5rem;height:2.5rem;padding:0;border:1px solid #e5e7eb;border-radius:0.5rem;margin:0 0.125rem;font-size:0.875rem;font-weight:500;line-height:1;}
        nav[role="navigation"] a:hover{background-color:#f1f5f9}

        nav[role="navigation"] a:hover{background-color:#f1f5f9}
        nav[role="navigation"] span[aria-current="page"]{background-color:#e0f2fe;border-color:#bae6fd;color:#0891b2;}
        nav[role="navigation"] span[aria-current="page"]>span{background-color:transparent;border:0;color:inherit;}

        .btn{display:inline-block;border-radius:9999px;padding:0.375rem 1rem;font-weight:600;font-size:0.875rem;transition:background-color .15s}
        .btn-primary{background-color:#0891b2;color:#fff}
        .btn-primary:hover{background-color:#0e7490}
        .btn-danger{background-color:transparent;color:#dc2626;border:1px solid #ef4444;font-size:0.875rem;padding:0.25rem 0.75rem}
        .btn-danger:hover{background-color:#ef4444;color:#fff}
        .btn-warning{background-color:transparent;color:#ca8a04;border:1px solid #facc15;font-size:0.875rem;padding:0.25rem 0.75rem}
        .btn-warning:hover{background-color:#facc15;color:#000}
        .bg-cyan-600{background-color:#0891b2!important}
        .bg-pink-700{background-color:#0e7490!important}
        .hover\:bg-pink-700:hover{background-color:#0e7490!important}
        .hover\:bg-cyan-600:hover{background-color:#0891b2!important}
        .text-pink-700{color:#0e7490!important}
        .text-pink-600{color:#0891b2!important}
        .bg-pink-100{background-color:#cffafe!important;color:#0e7490!important}
        .bg-pink-50{background-color:#ecfeff!important}
        .hover\:bg-pink-50:hover{background-color:#ecfeff!important}
        .hover\:bg-pink-100:hover{background-color:#cffafe!important}
        .focus\:ring-pink-400:focus{box-shadow:0 0 0 2px #22d3ee!important}
        .focus\:border-pink-400:focus{border-color:#22d3ee!important}
        .ring-pink-400{--tw-ring-color:#22d3ee!important}

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-page-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

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
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-700 min-h-screen flex font-sans">
    @if(auth()->check())
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-white to-gray-50 border-r border-gray-200 shadow-sm fixed inset-y-0 flex flex-col justify-between">
            <div>
                <div class="px-6 py-6 border-b">
                    <span class="font-bold text-xl text-cyan-700">Dashboard Kinerja</span>
                </div>
                <nav class="px-4 py-6 space-y-2 flex-1">
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 whitespace-nowrap rounded transition-colors duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-50 text-cyan-700 font-semibold' : 'hover:bg-gray-50 text-gray-700' }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 21V9.75z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('admin.indikator.index') }}" class="flex items-center gap-3 px-4 py-2 whitespace-nowrap rounded transition-colors duration-150 {{ request()->routeIs('admin.indikator.*') ? 'bg-cyan-50 text-cyan-700 font-semibold' : 'hover:bg-gray-50 text-gray-700' }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M3 9h18M3 15h18M3 21h18" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h4v-4H9zM15 17h4v-9h-4z" />
                            </svg>
                            <span>Manajemen Indikator</span>
                        </a>
                        <a href="{{ route('admin.pegawai.index') }}" class="flex items-center gap-3 px-4 py-2 whitespace-nowrap rounded transition-colors duration-150 {{ request()->routeIs('admin.pegawai.*') ? 'bg-cyan-50 text-cyan-700 font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.9 4.024a9 9 0 01-13.779 13.78z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Manajemen Pegawai</span>
                        </a>
                    @elseif(auth()->user()->role === 'pegawai')
                        <a href="{{ route('pegawai.dashboard') }}" class="flex items-center gap-3 px-4 py-2 whitespace-nowrap rounded transition-colors duration-150 {{ request()->routeIs('pegawai.dashboard') ? 'bg-cyan-50 text-cyan-700 font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.9 4.024a9 9 0 01-13.779 13.78z" />
                            </svg>
                            <span>Profil Kinerja</span>
                        </a>
                        <a href="{{ route('pegawai.indikator.index') }}" class="flex items-center gap-3 px-4 py-2 whitespace-nowrap rounded transition-colors duration-150 {{ request()->routeIs('pegawai.indikator.*') ? 'bg-cyan-50 text-cyan-700 font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 9h18M3 15h18M3 21h18" />
                            </svg>
                            <span>Indikator Saya</span>
                        </a>
                        <a href="{{ route('pegawai.riwayat-kinerja.index') }}" class="flex items-center gap-3 px-4 py-2 whitespace-nowrap rounded transition-colors duration-150 {{ request()->routeIs('pegawai.riwayat-kinerja.*') ? 'bg-cyan-50 text-cyan-700 font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Riwayat Kinerja</span>
                        </a>
                    @endif
                </nav>
            </div>
            <div class="px-4 py-4 border-t sticky bottom-0">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full px-4 py-2 rounded bg-cyan-600 text-white hover:bg-cyan-700 font-semibold">Keluar</button>
                </form>
            </div>
        </aside>
    @endif

    <!-- Main Content -->
    <main class="@if(auth()->check()) ml-64 flex-1 p-8 bg-gray-100 min-h-screen @else flex items-center justify-center min-h-screen w-full @endif">
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
