@if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white">Dashboard</a>
            @elseif(auth()->user()->role === 'pegawai')
                <a href="{{ route('pegawai.dashboard') }}" class="font-semibold text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white">Dashboard</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="ml-4 font-semibold text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white">Register</a>
            @endif
        @endauth
    </div>
@endif
