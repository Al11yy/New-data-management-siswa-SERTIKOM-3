<x-app-layout>
    <div class="p-6 lg:p-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white">Data Tahun Ajar</h1>
                <p class="text-white/60 text-sm mt-1">Kelola periode tahun ajaran</p>
            </div>
            <a href="{{ route('tahun_ajar.create') }}" 
               class="px-5 py-2.5 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Tambah Tahun Ajar
            </a>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($tahunAjars as $item)
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-10 h-10 rounded-lg bg-purple-500/10 border border-purple-400/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                        </div>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="p-1.5 rounded-lg hover:bg-white/10 transition">
                                <svg class="w-4 h-4 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                            <div x-show="open" @click.outside="open = false" 
                                 class="absolute right-0 w-40 bg-slate-800 border border-white/10 rounded-lg shadow-lg py-2 z-10">
                                <a href="{{ route('tahun_ajar.edit', $item->id) }}" 
                                   class="flex items-center gap-2 px-4 py-2 text-sm text-white/70 hover:text-white hover:bg-white/5 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('tahun_ajar.destroy', $item->id) }}" method="POST" 
                                      onsubmit="return confirm('Hapus tahun ajar ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">{{ $item->nama_tahun_ajar }}</h3>
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-sm text-white/80">
                            {{ $item->kode_tahun_ajar }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3">
                    <div class="bg-white/5 border border-white/10 rounded-xl p-8 text-center">
                        <div class="w-12 h-12 rounded-lg bg-white/5 mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                        </div>
                        <p class="text-white/60 mb-4">Belum ada data tahun ajar</p>
                        <a href="{{ route('tahun_ajar.create') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white text-black text-sm font-medium hover:bg-white/90 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            Tambah Tahun Ajar Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>