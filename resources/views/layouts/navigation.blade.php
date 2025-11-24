<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 h-screen fixed top-0 left-0 w-64 flex flex-col">

    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b dark:border-gray-700">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    <!-- Menu Utama -->
    <div class="flex-1 overflow-y-auto">
        <ul class="mt-4 space-y-1 px-4">

            <!-- Dashboard -->
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            <!-- Tambahin link lain di sini nanti, contoh: -->
            <li>
                <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')" class="w-full">
                    Data Siswa
                </x-nav-link>
            </li>

            <li>
                <x-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')" class="w-full">
                    Data Kelas
                </x-nav-link>
            </li>

            <li>
                <x-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')" class="w-full">
                    Jurusan
                </x-nav-link>
            </li>

            <li>
                <x-nav-link :href="route('tahun_ajar.index')" :active="request()->routeIs('tahun_ajar.*')" class="w-full">
                    Tahun ajar
                </x-nav-link>
            </li>

        </ul>
    </div>

    <!-- User Profile -->
    <div class="border-t dark:border-gray-700 p-4">
        <div class="flex items-center">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-gray-500">
                    {{ Auth::user()->email }}
                </p>
            </div>

            <!-- Dropdown Button -->
            <button @click="open = !open" class="text-gray-500 dark:text-gray-300 hover:text-gray-700">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" />
                </svg>
            </button>
        </div>

        <!-- Dropdown -->
        <div x-show="open" class="mt-3 space-y-2" x-cloak>
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>

</nav>

<!-- Content (geser karena ada sidebar) -->
<div class="ml-64">
