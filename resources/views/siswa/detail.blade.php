<x-app-layout>
    <div class="p-6">

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-500/20 border border-green-500/30 text-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="mb-4 p-3 bg-blue-500/10 border border-blue-500/20 text-blue-200 rounded-lg">
                {{ session('info') }}
            </div>
        @endif

        <h1 class="text-3xl font-extrabold text-white mb-6">
            Detail Siswa
        </h1>

        <!-- Card Utama -->
        <div class="bg-white/10 rounded-2xl border border-white/20 shadow-xl p-6 mb-8">

            <h2 class="text-xl font-bold text-white mb-4">Informasi Siswa</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-white/90">
                <p><span class="font-semibold">NISN:</span> {{ $siswa->nisn }}</p>
                <p><span class="font-semibold">Nama Lengkap:</span> {{ $siswa->nama_lengkap }}</p>
                <p><span class="font-semibold">Jenis Kelamin:</span> {{ $siswa->jenis_kelamin }}</p>
                <p><span class="font-semibold">Jurusan:</span> {{ $siswa->jurusan->nama_jurusan ?? '-' }}</p>
                <p><span class="font-semibold">Kelas Saat Ini:</span> {{ $siswa->kelas->nama_kelas ?? '-' }}</p>
                <p><span class="font-semibold">Tahun Ajar Aktif:</span> {{ $siswa->tahunAjar->nama_tahun_ajar ?? '-' }}</p>
            </div>
        </div>

        <!-- Riwayat Kelas Detail -->
        <div class="bg-white/10 rounded-2xl border border-white/20 shadow-xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-white">Riwayat Kenaikan Kelas</h2>

                <!-- TOMBOL EDIT KELAS (buka modal) -->
                <button
                    onclick="document.getElementById('editKelasModal').showModal()"
                    class="px-4 py-2 text-sm bg-blue-500 text-white font-medium rounded-xl shadow-lg hover:bg-blue-600 transition duration-200 transform hover:scale-105">
                    Edit Kelas
                </button>
            </div>

            @if ($siswa->kelasDetails->count() == 0)
                <p class="text-white/70 italic">Belum ada detail kelas.</p>
            @else
                <div class="overflow-hidden rounded-xl border border-white/20">
                    <table class="w-full text-left text-sm text-white">
                        <thead class="bg-white/15">
                            <tr>
                                <th class="p-3">Kelas</th>
                                <th class="p-3">Tahun Ajar</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Dibuat</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($siswa->kelasDetails as $detail)
                                <tr class="border-b border-white/10 hover:bg-white/5 transition">
                                    <td class="p-3">{{ $detail->kelas->nama_kelas ?? '-' }}</td>
                                    <td class="p-3">{{ $detail->tahunAjar->nama_tahun_ajar ?? '-' }}</td>
                                    <td class="p-3">
                                        <span class="px-3 py-1 rounded-full text-xs
                                            {{ $detail->status == 'aktif' ? 'bg-green-600' : 'bg-red-600' }}">
                                            {{ ucfirst($detail->status) }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-sm text-white/70">{{ $detail->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal (Dialog element) -->
    <dialog id="editKelasModal" class="rounded-xl p-4 bg-gray-900/80 border border-white/10 w-[90%] md:w-2/5">
        <form method="POST" action="{{ route('kelas_detail.gantiKelas', $siswa->id) }}">
            @csrf

            <h3 class="text-lg font-semibold text-white mb-3">Ganti Kelas Siswa</h3>

            <label class="text-white text-sm">Pilih Kelas Baru</label>
            <select name="kelas_id" required class="w-full mt-2 p-2 rounded-lg bg-white/5 border border-white/20 text-white">
                @foreach ($allKelas as $kelas)
                    <option value="{{ $kelas->id }}" {{ $kelas->id == $siswa->kelas_id ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }} (level: {{ $kelas->level_kelas ?? '-' }})
                    </option>
                @endforeach
            </select>

            <div class="mt-4 flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('editKelasModal').close()"
                    class="px-4 py-2 bg-gray-600 text-white rounded-lg">Batal</button>

                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </dialog>

    <script>
        // fallback kecil bila dialog tidak didukung (opsional)
        (function() {
            const d = document.getElementById('editKelasModal');
            if (typeof d.showModal !== 'function') {
                // polyfill very simple: toggle class
                d.style.display = 'none';
            }
        })();
    </script>
</x-app-layout>
