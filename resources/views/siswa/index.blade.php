<x-app-layout>
    <!-- Enhanced siswa index with card-based layout -->
    <div class="page-wrapper">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">Data Siswa</h1>
                <p class="text-white/50 mt-1">Kelola semua data siswa yang terdaftar dalam sistem</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('siswa.create') }}" class="btn-primary text-white px-6 py-3 rounded-xl text-sm flex items-center gap-2.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Siswa
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="glass-card rounded-3xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/[0.04]">
                            <th class="text-left text-xs font-semibold text-white/40 uppercase tracking-wider p-5">Siswa</th>
                            <th class="text-left text-xs font-semibold text-white/40 uppercase tracking-wider p-5">NISN</th>
                            <th class="text-left text-xs font-semibold text-white/40 uppercase tracking-wider p-5 hidden md:table-cell">Jurusan</th>
                            <th class="text-left text-xs font-semibold text-white/40 uppercase tracking-wider p-5">Kelas</th>
                            <th class="text-left text-xs font-semibold text-white/40 uppercase tracking-wider p-5 hidden lg:table-cell">Tahun Ajar</th>
                            <th class="text-right text-xs font-semibold text-white/40 uppercase tracking-wider p-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $item)
                            <tr class="border-b border-white/[0.03] hover:bg-white/[0.02] transition-all duration-150">
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500/20 to-purple-500/20 flex items-center justify-center">
                                            <span class="text-white font-semibold">{{ substr($item->nama_lengkap, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-white font-medium">{{ $item->nama_lengkap }}</p>
                                            <p class="text-white/40 text-xs mt-0.5">{{ $item->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5">
                                    <span class="text-white/70 text-sm font-mono bg-white/[0.04] px-2.5 py-1 rounded-lg">{{ $item->nisn }}</span>
                                </td>
                                <td class="p-5 hidden md:table-cell">
                                    <span class="text-white/60 text-sm">{{ $item->jurusan->nama_jurusan }}</span>
                                </td>
                                <td class="p-5">
                                    <span class="badge badge-info">{{ $item->kelas->nama_kelas }}</span>
                                </td>
                                <td class="p-5 hidden lg:table-cell">
                                    <span class="text-white/60 text-sm">{{ $item->tahunAjar->nama_tahun_ajar }}</span>
                                </td>
                                <td class="p-5 text-right">
                                    <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block">
                                        <button @click="open = !open" class="p-2.5 rounded-xl hover:bg-white/[0.06] transition-colors duration-200">
                                            <svg class="w-5 h-5 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>
                                        <div x-show="open" x-transition class="absolute right-0 w-48 glass-card-elevated rounded-2xl shadow-2xl z-10 py-2 @if($loop->last || $loop->iteration > count($siswas) - 2) bottom-full mb-2 @else mt-2 @endif">
                                            <a href="{{ route('siswa.show', $item->id) }}" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/[0.04] transition-all duration-150">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Lihat Detail
                                            </a>
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/[0.04] transition-all duration-150">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                                Edit Data
                                            </a>
                                            <div class="border-t border-white/[0.04] my-1"></div>
                                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-400/80 hover:text-red-400 hover:bg-red-500/10 transition-all duration-150">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                    Hapus Data
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-12 text-center">
                                    <div class="w-16 h-16 rounded-2xl bg-white/[0.04] flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-white/50 mb-4">Belum ada data siswa</p>
                                    <a href="{{ route('siswa.create') }}" class="btn-primary px-5 py-2.5 rounded-xl text-sm inline-flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Tambah Siswa Pertama
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
