<x-app-layout>
    <div class="p-6">
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8 relative">
            <!-- Decorative elements -->
            <div class="absolute top-0 left-0 -translate-x-1/4 -translate-y-1/4 w-48 h-48 rounded-full bg-cyan-500/5 opacity-50 blur-2xl"></div>
            <div class="absolute bottom-0 right-0 translate-x-1/4 translate-y-1/4 w-48 h-48 rounded-full bg-violet-500/5 opacity-50 blur-2xl"></div>

            <h1 class="text-3xl font-extrabold text-white mb-8 relative">Tambah Riwayat Kelas</h1>

            <form action="{{ route('kelas-detail.store') }}" method="POST" class="relative">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="siswa_id" class="block text-slate-300 text-sm font-bold mb-2">Siswa</label>
                        <div class="relative">
                            <select name="siswa_id" id="siswa_id" required class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                @foreach ($siswas as $s)
                                    <option value="{{ $s->id }}" class="bg-slate-800">{{ $s->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="kelas_id" class="block text-slate-300 text-sm font-bold mb-2">Kelas</label>
                        <div class="relative">
                            <select name="kelas_id" id="kelas_id" required class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" class="bg-slate-800">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="tahun_ajar_id" class="block text-slate-300 text-sm font-bold mb-2">Tahun Ajar</label>
                        <div class="relative">
                            <select name="tahun_ajar_id" id="tahun_ajar_id" required class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                @foreach ($tahunAjars as $t)
                                    <option value="{{ $t->id }}" class="bg-slate-800">{{ $t->nama_tahun_ajar }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="status" class="block text-slate-300 text-sm font-bold mb-2">Status</label>
                        <div class="relative">
                            <select name="status" id="status" required class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                <option value="aktif" class="bg-slate-800">Aktif</option>
                                <option value="nonaktif" class="bg-slate-800">Nonaktif</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('kelas-detail.index') }}" class="text-cyan-400 hover:text-white transition relative z-10">
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
