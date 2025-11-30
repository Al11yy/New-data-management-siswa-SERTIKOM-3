<!-- Complete redesign with new logo and improved UI -->
<nav x-data="{ open: false, userMenu: false }" class="fixed top-0 left-0 h-screen w-72 flex flex-col bg-[#0a0a0c]/90 backdrop-blur-3xl border-r border-white/[0.04] z-50">

    <!-- Logo Section with new logo -->
    <div class="flex items-center gap-4 px-6 h-24 border-b border-white/[0.04]">
        <div class="w-14 h-14 rounded-2xl overflow-hidden bg-transparent flex items-center justify-center">
            <img src="public/images/Logojir.png" 
                 alt="EduData Logo" 
                 class="w-full h-full object-contain">
        </div>
        <div>
            <h1 class="text-white font-bold text-xl tracking-tight">Smk Pesat</h1>
            <p class="text-white/35 text-xs font-medium">Sistem Pendataan Siswa</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <div class="flex-1 overflow-y-auto py-8 px-4">
        <p class="text-white/30 text-[10px] font-semibold uppercase tracking-widest px-4 mb-4">Menu Utama</p>
        <div class="space-y-1.5">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-white/[0.08] text-white shadow-lg shadow-white/[0.02]' : 'text-white/55 hover:text-white hover:bg-white/[0.04]' }}">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ request()->routeIs('dashboard') ? 'bg-white/10' : 'bg-white/[0.03]' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                </div>
                Dashboard
            </a>

            <!-- Data Siswa -->
            <a href="{{ route('siswa.index') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('siswa.*') ? 'bg-white/[0.08] text-white shadow-lg shadow-white/[0.02]' : 'text-white/55 hover:text-white hover:bg-white/[0.04]' }}">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ request()->routeIs('siswa.*') ? 'bg-white/10' : 'bg-white/[0.03]' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                Data Siswa
            </a>

            <!-- Data Kelas -->
            <a href="{{ route('kelas.index') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('kelas.*') ? 'bg-white/[0.08] text-white shadow-lg shadow-white/[0.02]' : 'text-white/55 hover:text-white hover:bg-white/[0.04]' }}">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ request()->routeIs('kelas.*') ? 'bg-white/10' : 'bg-white/[0.03]' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                </div>
                Data Kelas
            </a>

            <!-- Jurusan -->
            <a href="{{ route('jurusan.index') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('jurusan.*') ? 'bg-white/[0.08] text-white shadow-lg shadow-white/[0.02]' : 'text-white/55 hover:text-white hover:bg-white/[0.04]' }}">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ request()->routeIs('jurusan.*') ? 'bg-white/10' : 'bg-white/[0.03]' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                </div>
                Jurusan
            </a>

            <!-- Tahun Ajar -->
            <a href="{{ route('tahun_ajar.index') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('tahun_ajar.*') ? 'bg-white/[0.08] text-white shadow-lg shadow-white/[0.02]' : 'text-white/55 hover:text-white hover:bg-white/[0.04]' }}">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ request()->routeIs('tahun_ajar.*') ? 'bg-white/10' : 'bg-white/[0.03]' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                </div>
                Tahun Ajar
            </a>
        </div>

        <div class="mt-8">
            <p class="text-white/30 text-[10px] font-semibold uppercase tracking-widest px-4 mb-4">Pengaturan</p>
            <div class="space-y-1.5">
                <!-- User Management -->
                <a href="{{ route('user_management.index') }}" 
                   class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('user_management.*') ? 'bg-white/[0.08] text-white shadow-lg shadow-white/[0.02]' : 'text-white/55 hover:text-white hover:bg-white/[0.04]' }}">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ request()->routeIs('user_management.*') ? 'bg-white/10' : 'bg-white/[0.03]' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    User Management
                </a>
            </div>
        </div>
    </div>

    <!-- User Profile Section -->
    <div class="border-t border-white/[0.04] p-4">
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="w-full flex items-center gap-3.5 p-3 rounded-2xl hover:bg-white/[0.04] transition-all duration-200">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-11 h-11 rounded-xl object-cover ring-2 ring-white/[0.08]">
                @else
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-white/10 to-white/5 flex items-center justify-center ring-2 ring-white/[0.08]">
                        <span class="text-white/80 font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                @endif
                <div class="flex-1 text-left">
                    <p class="text-white text-sm font-semibold truncate">{{ Auth::user()->name }}</p>
                    <p class="text-white/35 text-xs truncate">{{ Auth::user()->email }}</p>
                </div>
                <svg class="w-4 h-4 text-white/30 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 @click.away="open = false"
                 class="absolute bottom-full left-0 right-0 mb-2 p-2 rounded-2xl bg-[#141416]/95 backdrop-blur-2xl border border-white/[0.06] shadow-2xl shadow-black/50"
                 x-cloak>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:text-white hover:bg-white/[0.06] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="text-sm font-medium">Profile</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400/80 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span class="text-sm font-medium">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
