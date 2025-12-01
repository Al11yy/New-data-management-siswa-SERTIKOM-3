<x-app-layout>
    <div class="p-6 lg:p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('siswa.index') }}" class="p-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition">
                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Edit Data Siswa</h1>
                        <p class="text-white/60 text-sm mt-1">Perbarui informasi siswa</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Data Pribadi Section -->
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-white/10 border border-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Data Pribadi</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- NISN -->
                            <div>
                                <label class="block text-white font-medium mb-2">NISN</label>
                                <input type="text" 
                                       name="nisn" 
                                       value="{{ old('nisn', $siswa->nisn) }}" 
                                       required 
                                       class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition">
                            </div>

                            <!-- Nama Lengkap -->
                            <div>
                                <label class="block text-white font-medium mb-2">Nama Lengkap</label>
                                <input type="text" 
                                       name="nama_lengkap" 
                                       value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" 
                                       required 
                                       class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label class="block text-white font-medium mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                                    <option value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label class="block text-white font-medium mb-2">Tanggal Lahir</label>
                                <input type="date" 
                                       name="tanggal_lahir" 
                                       value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" 
                                       required 
                                       class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition">
                            </div>
                        </div>
                    </div>

                    <!-- Data Akademik Section -->
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-white/10 border border-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Data Akademik</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Jurusan -->
                            <div>
                                <label class="block text-white font-medium mb-2">Jurusan</label>
                                <select name="jurusan_id" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                                    @foreach ($jurusans as $j)
                                        <option value="{{ $j->id }}" {{ old('jurusan_id', $siswa->jurusan_id) == $j->id ? 'selected' : '' }}>
                                            {{ $j->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kelas -->
                            <div>
                                <label class="block text-white font-medium mb-2">Kelas</label>
                                <select name="kelas_id" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tahun Ajar -->
                            <div>
                                <label class="block text-white font-medium mb-2">Tahun Ajar</label>
                                <select name="tahun_ajar_id" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                                    @foreach ($tahunAjars as $t)
                                        <option value="{{ $t->id }}" {{ old('tahun_ajar_id', $siswa->tahun_ajar_id) == $t->id ? 'selected' : '' }}>
                                            {{ $t->nama_tahun_ajar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Section -->
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-white/10 border border-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Alamat</h3>
                        </div>
                        
                        <div>
                            <label class="block text-white font-medium mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" 
                                      rows="3" 
                                      required 
                                      class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition resize-none">{{ old('alamat', $siswa->alamat) }}</textarea>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-8 border-t border-white/10">
                        <a href="{{ route('siswa.index') }}" 
                           class="flex-1 py-3 rounded-lg bg-white/5 border border-white/10 text-white/70 text-center hover:bg-white/10 hover:text-white transition">
                            Batal
                        </a>
                        <button type="submit" 
                                class="flex-1 py-3 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>