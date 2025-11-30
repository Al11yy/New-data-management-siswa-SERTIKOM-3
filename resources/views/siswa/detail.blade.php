<x-app-layout>
    <!-- Redesigned siswa detail with glassmorphism -->
    <div class="p-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="mb-6 p-4 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
                {{ session('info') }}
            </div>
        @endif

        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('siswa.index') }}" class="inline-flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors duration-200 mb-4">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Kembali
            </a>
            <h1 class="text-2xl font-bold text-white tracking-tight">Detail Siswa</h1>
            <p class="text-white/50 mt-1">Informasi lengkap dan riwayat kelas</p>
        </div>

        <!-- Student Info Card -->
        <div class="glass-card rounded-2xl p-8 mb-6">
            <h2 class="text-lg font-semibold text-white mb-6">Informasi Siswa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="space-y-1">
                    <p class="text-white/40 text-xs uppercase tracking-wider">NISN</p>
                    <p class="text-white font-mono">{{ $siswa->nisn }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-white/40 text-xs uppercase tracking-wider">Nama Lengkap</p>
                    <p class="text-white font-medium">{{ $siswa->nama_lengkap }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-white/40 text-xs uppercase tracking-wider">Jenis Kelamin</p>
                    <p class="text-white">{{ ucfirst($siswa->jenis_kelamin) }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-white/40 text-xs uppercase tracking-wider">Jurusan</p>
                    <p class="text-white">{{ $siswa->jurusan->nama_jurusan ?? '-' }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-white/40 text-xs uppercase tracking-wider">Kelas Saat Ini</p>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/[0.08] text-white text-sm font-medium">
                        {{ $siswa->kelas->nama_kelas ?? '-' }}
                    </span>
                </div>
                <div class="space-y-1">
                    <p class="text-white/40 text-xs uppercase tracking-wider">Tahun Ajar Aktif</p>
                    <p class="text-white">{{ $siswa->tahunAjar->nama_tahun_ajar ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Class History Card -->
        <div class="glass-card rounded-2xl overflow-hidden">
            <div class="flex items-center justify-between p-6 border-b border-white/[0.06]">
                <div>
                    <h2 class="text-lg font-semibold text-white">Riwayat Kenaikan Kelas</h2>
                    <p class="text-white/40 text-sm mt-1">Histori perpindahan dan kenaikan kelas</p>
                </div>
                <button onclick="document.getElementById('editKelasModal').showModal()" class="btn-secondary px-4 py-2 rounded-xl text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Edit Kelas
                </button>
            </div>

            @if ($siswa->kelasDetails->count() == 0)
                <div class="p-12 text-center">
                    <div class="w-16 h-16 rounded-2xl bg-white/[0.04] flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-white/40">Belum ada riwayat kelas</p>
                </div>
            @else
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/[0.06]">
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider p-4">Kelas</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider p-4">Tahun Ajar</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider p-4">Status</th>
                            <th class="text-left text-xs font-medium text-white/40 uppercase tracking-wider p-4">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->kelasDetails as $detail)
                            <tr class="border-b border-white/[0.04] hover:bg-white/[0.02] transition-all duration-150">
                                <td class="p-4">
                                    <span class="text-white font-medium">{{ $detail->kelas->nama_kelas ?? '-' }}</span>
                                </td>
                                <td class="p-4">
                                    <span class="text-white/70">{{ $detail->tahunAjar->nama_tahun_ajar ?? '-' }}</span>
                                </td>
                                <td class="p-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $detail->status == 'aktif' ? 'bg-emerald-500/15 text-emerald-400' : 'bg-red-500/15 text-red-400' }}">
                                        {{ ucfirst($detail->status) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="text-white/50 text-sm">{{ $detail->created_at->diffForHumans() }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Edit Class Modal -->
    <dialog id="editKelasModal" class="bg-transparent">
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="w-full max-w-md bg-[#141414] border border-white/[0.08] rounded-2xl shadow-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-white">Ganti Kelas Siswa</h3>
                    <button onclick="document.getElementById('editKelasModal').close()" class="p-2 rounded-lg hover:bg-white/[0.06] transition-colors duration-200">
                        <svg class="w-5 h-5 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('kelas_detail.gantiKelas', $siswa->id) }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-white/70 text-sm font-medium mb-2">Pilih Kelas Baru</label>
                        <select name="kelas_id" required class="w-full glass-input rounded-xl text-white p-3.5 text-sm appearance-none cursor-pointer">
                            @foreach ($allKelas as $kelas)
                                <option value="{{ $kelas->id }}" {{ $kelas->id == $siswa->kelas_id ? 'selected' : '' }} class="bg-[#1a1a1a]">
                                    {{ $kelas->nama_kelas }} (Level: {{ $kelas->level_kelas ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="document.getElementById('editKelasModal').close()" class="flex-1 btn-secondary px-5 py-2.5 rounded-xl text-sm">Batal</button>
                        <button type="submit" class="flex-1 btn-primary px-5 py-2.5 rounded-xl text-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</x-app-layout>
