<!-- Responsive navigation with mobile drawer -->
<nav x-data="{ mobileOpen: false }">
    <!-- Mobile Top Bar -->
    <div class="lg:hidden fixed top-0 left-0 right-0 z-40 flex items-center justify-between gap-3 border-b border-white/10 bg-[#050505]/95 px-4 py-4 backdrop-blur-2xl">
        <button @click="mobileOpen = true" class="p-3 rounded-2xl bg-white/5 border border-white/10 text-white hover:bg-white/10 transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h10" />
            </svg>
        </button>
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl border border-white/10 bg-white/5 flex items-center justify-center">
                <img src="{{ asset('images/Logojir.png') }}" alt="EduData Logo" class="w-7 h-7 object-contain">
            </div>
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-white/40">EduData</p>
                <p class="text-sm font-semibold text-white">SMK Pesat</p>
            </div>
        </div>
        <a href="{{ route('profile.edit') }}" class="p-1 rounded-full border border-white/10 bg-white/5">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-10 h-10 rounded-full object-cover">
            @else
                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white text-sm font-semibold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>

    <!-- Mobile Drawer -->
    <div x-show="mobileOpen" x-transition class="lg:hidden fixed inset-0 z-50" x-cloak>
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="mobileOpen = false"></div>
        <div class="absolute left-0 top-0 h-full w-72 bg-[#0a0a0c]/95 backdrop-blur-3xl border-r border-white/10 flex flex-col overflow-hidden">
            <div class="flex items-center justify-between px-6 h-20 border-b border-white/10">
                <div>
                    <p class="text-white text-lg font-semibold">Menu</p>
                    <p class="text-white/40 text-xs">Navigasi utama</p>
                </div>
                <button @click="mobileOpen = false" class="p-2 rounded-xl bg-white/5 border border-white/10 text-white/70 hover:bg-white/10 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto">
                @include('layouts.sidebar-content')
            </div>
        </div>
    </div>

    <!-- Desktop Sidebar -->
    <aside class="hidden lg:flex fixed top-0 left-0 h-screen w-72 flex-col bg-[#0a0a0c]/90 backdrop-blur-3xl border-r border-white/[0.04] z-40">
        @include('layouts.sidebar-content')
    </aside>
</nav>
