<x-app-layout>
    <div class="p-6 lg:p-8">
        <!-- Success Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="mb-6 p-4 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                </svg>
                {{ session('info') }}
            </div>
        @endif

        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('siswa.index') }}" class="p-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition">
                    <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-white">Detail Siswa</h1>
                    <p class="text-white/60 text-sm mt-1">Informasi lengkap siswa</p>
                </div>
            </div>
        </div>

        <!-- Student Info Card -->
        <div class="bg-white/5 border border-white/10 rounded-xl p-6 mb-6">
            <h2 class="text-lg font-semibold text-white mb-6">Informasi Siswa</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- NISN -->
                <div>
                    <p class="text-white/60 text-sm mb-1">NISN</p>
                    <p class="text-white font-mono text-lg">{{ $siswa->nisn }}</p>
                </div>

                <!-- Nama -->
                <div>
                    <p class="text-white/60 text-sm mb-1">Nama Lengkap</p>
                    <p class="text-white font-medium text-lg">{{ $siswa->nama_lengkap }}</p>
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <p class="text-white/60 text-sm mb-1">Jenis Kelamin</p>
                    <p class="text-white">{{ ucfirst($siswa->jenis_kelamin) }}</p>
                </div>

                <!-- Jurusan -->
                <div>
                    <p class="text-white/60 text-sm mb-1">Jurusan</p>
                    <p class="text-white">{{ $siswa->jurusan->nama_jurusan ?? '-' }}</p>
                </div>

                <!-- Kelas -->
                <div>
                    <p class="text-white/60 text-sm mb-1">Kelas Saat Ini</p>
                    <span class="inline-block px-3 py-1.5 bg-white/10 border border-white/10 rounded-lg text-white text-sm">
                        {{ $siswa->kelas->nama_kelas ?? '-' }}
                    </span>
                </div>

                <!-- Tahun Ajar -->
                <div>
                    <p class="text-white/60 text-sm mb-1">Tahun Ajar</p>
                    <p class="text-white">{{ $siswa->tahunAjar->nama_tahun_ajar ?? '-' }}</p>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 pt-6 border-t border-white/10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tanggal Lahir -->
                    <div>
                        <p class="text-white/60 text-sm mb-1">Tanggal Lahir</p>
                        <p class="text-white">{{ $siswa->tanggal_lahir ? date('d/m/Y', strtotime($siswa->tanggal_lahir)) : '-' }}</p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <p class="text-white/60 text-sm mb-1">Alamat</p>
                        <p class="text-white">{{ $siswa->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class History Card -->
        <div class="bg-white/5 border border-white/10 rounded-xl overflow-hidden">
            <!-- Card Header -->
            <div class="flex items-center justify-between p-6 border-b border-white/10">
                <div>
                    <h2 class="text-lg font-semibold text-white">Riwayat Kelas</h2>
                    <p class="text-white/60 text-sm mt-1">Histori perpindahan kelas</p>
                </div>
                <button onclick="document.getElementById('editKelasModal').showModal()" 
                        class="px-4 py-2 rounded-lg bg-white/10 border border-white/10 text-white/70 hover:bg-white/20 hover:text-white transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>
                    Ganti Kelas
                </button>
            </div>

            <!-- History Table -->
            @if ($siswa->kelasDetails->count() == 0)
                <div class="p-8 text-center">
                    <div class="w-12 h-12 rounded-lg bg-white/5 mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-white/60">Belum ada riwayat kelas</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="text-left py-4 px-6 text-sm font-medium text-white/60">Kelas</th>
                                <th class="text-left py-4 px-6 text-sm font-medium text-white/60">Tahun Ajar</th>
                                <th class="text-left py-4 px-6 text-sm font-medium text-white/60">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-medium text-white/60">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa->kelasDetails as $detail)
                                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                                    <td class="py-4 px-6">
                                        <span class="text-white">{{ $detail->kelas->nama_kelas ?? '-' }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="text-white/70">{{ $detail->tahunAjar->nama_tahun_ajar ?? '-' }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-medium 
                                            {{ $detail->status == 'aktif' ? 'bg-emerald-500/15 text-emerald-400' : 'bg-white/10 text-white/70' }}">
                                            {{ ucfirst($detail->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="text-white/60 text-sm">{{ $detail->created_at->diffForHumans() }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Edit Class Modal -->
    <dialog id="editKelasModal" class="bg-transparent backdrop:bg-black/50">
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md bg-slate-800 border border-white/10 rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Ganti Kelas</h3>
                        <p class="text-white/60 text-sm mt-1">Pindahkan ke kelas baru</p>
                    </div>
                    <button onclick="document.getElementById('editKelasModal').close()" 
                            class="p-2 rounded-lg hover:bg-white/10 transition">
                        <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('kelas_detail.gantiKelas', $siswa->id) }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-white font-medium mb-2">Pilih Kelas Baru</label>
                        <select name="kelas_id" 
                                required 
                                class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                            @foreach ($allKelas as $kelas)
                                <option value="{{ $kelas->id }}" {{ $kelas->id == $siswa->kelas_id ? 'selected' : '' }}>
                                    {{ $kelas->nama_kelas }} (Level {{ $kelas->level_kelas }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" 
                                onclick="document.getElementById('editKelasModal').close()" 
                                class="flex-1 py-3 rounded-lg bg-white/5 border border-white/10 text-white/70 hover:bg-white/10 hover:text-white transition">
                            Batal
                        </button>
                        <button type="submit" 
                                class="flex-1 py-3 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</x-app-layout>