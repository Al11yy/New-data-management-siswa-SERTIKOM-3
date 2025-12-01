<x-app-layout>
    <!-- Enhanced siswa create form with better layout -->
    <div class="page-wrapper">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('siswa.index') }}" class="inline-flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors duration-200 mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Kembali ke Data Siswa
                </a>
                <h1 class="text-3xl font-bold text-white tracking-tight">Tambah Siswa Baru</h1>
                <p class="text-white/50 mt-1">Isi formulir di bawah untuk mendaftarkan siswa baru ke dalam sistem</p>
            </div>

            <!-- Form Card -->
            <div class="glass-card-elevated rounded-3xl p-8 lg:p-10">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    
                    <!-- Section: Data Pribadi -->
                    <div class="mb-10">
                        <h3 class="text-lg font-semibold text-white mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            Data Pribadi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">NISN</label>
                                <input type="text" name="nisn" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm placeholder:text-black/50" placeholder="Masukkan NISN siswa">
                            </div>
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm placeholder:text-black/50" placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm appearance-none cursor-pointer">
                                    <option value="" class="bg-[#141416]">Pilih jenis kelamin</option>
                                    <option value="laki-laki" class="bg-[#141416]">Laki-laki</option>
                                    <option value="perempuan" class="bg-[#141416]">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Section: Data Akademik -->
                    <div class="mb-10">
                        <h3 class="text-lg font-semibold text-white mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                            </div>
                            Data Akademik
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">Jurusan</label>
                                <select name="jurusan_id" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm appearance-none cursor-pointer">
                                    <option value="" class="bg-[#141416]">Pilih jurusan</option>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}" class="bg-[#141416]">{{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">Kelas</label>
                                <select name="kelas_id" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm appearance-none cursor-pointer">
                                    <option value="" class="bg-[#141416]">Pilih kelas</option>
                                    @foreach($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}" class="bg-[#141416]">{{ $kelasItem->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-white/70 text-sm font-medium mb-2.5">Tahun Ajar</label>
                                <select name="tahun_ajar_id" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm appearance-none cursor-pointer">
                                    <option value="" class="bg-[#141416]">Pilih tahun ajar</option>
                                    @foreach($tahunAjars as $tahunAjar)
                                        <option value="{{ $tahunAjar->id }}" class="bg-[#141416]">{{ $tahunAjar->nama_tahun_ajar }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Alamat -->
                    <div class="mb-10">
                        <h3 class="text-lg font-semibold text-white mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            Alamat
                        </h3>
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="4" required class="w-full glass-input rounded-xl text-black px-4 py-4 text-sm placeholder:text-black/50 resize-none" placeholder="Masukkan alamat lengkap siswa"></textarea>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-8 border-t border-white/[0.04]">
                        <a href="{{ route('siswa.index') }}" class="w-full sm:w-auto btn-secondary text-white px-8 py-3.5 rounded-xl text-sm text-center">Batal</a>
                        <button type="submit" class="w-full sm:w-auto btn-primary text-white px-8 py-3.5 rounded-xl text-sm">Simpan Data Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
