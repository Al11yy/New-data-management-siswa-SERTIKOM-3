<x-app-layout>
    <div class="p-6">
        <div class="max-w-3xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8 relative">
            <!-- Decorative Element -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden rounded-2xl">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full bg-cyan-500/5 opacity-20 animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-48 h-48 rounded-full bg-violet-500/5 opacity-20 animate-pulse"></div>
            </div>

            <h1 class="text-3xl font-extrabold text-white mb-8 relative">Tambah Siswa Baru</h1>

            <form action="{{ route('siswa.store') }}" method="POST" class="relative">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nisn" class="block text-slate-300 text-sm font-bold mb-2">NISN</label>
                        <input type="text" name="nisn" id="nisn" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                    </div>
                    <div>
                        <label for="nama_lengkap" class="block text-slate-300 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block text-slate-300 text-sm font-bold mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                            <option value="laki-laki" class="bg-slate-800">Laki-laki</option>
                            <option value="perempuan" class="bg-slate-800">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="jurusan_id" class="block text-slate-300 text-sm font-bold mb-2">Jurusan</label>
                        <select name="jurusan_id" id="jurusan_id" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                            @foreach($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}" class="bg-slate-800">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="kelas_id" class="block text-slate-300 text-sm font-bold mb-2">Kelas</label>
                        <select name="kelas_id" id="kelas_id" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                            @foreach($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}" class="bg-slate-800">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tahun_ajar_id" class="block text-slate-300 text-sm font-bold mb-2">Tahun Ajar</label>
                        <select name="tahun_ajar_id" id="tahun_ajar_id" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                            @foreach($tahunAjars as $tahunAjar)
                                <option value="{{ $tahunAjar->id }}" class="bg-slate-800">{{ $tahunAjar->nama_tahun_ajar }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('siswa.index') }}" class="text-cyan-400 hover:text-white transition relative z-10">
                        &larr; Kembali
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-cyan-500 text-white font-bold rounded-xl shadow-lg hover:bg-cyan-600 transition duration-200 transform hover:scale-105 relative z-10">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>