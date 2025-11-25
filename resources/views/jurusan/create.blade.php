<x-app-layout>
    <div class="p-6">
        <div class="max-w-2xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8">
            <h1 class="text-3xl font-extrabold text-white mb-8">Tambah Jurusan Baru</h1>

            <form action="{{ route('jurusan.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="kode_jurusan" class="block text-slate-300 text-sm font-bold mb-2">Kode Jurusan</label>
                        <input type="text" name="kode_jurusan" id="kode_jurusan" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                    </div>
                    <div>
                        <label for="nama_jurusan" class="block text-slate-300 text-sm font-bold mb-2">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="nama_jurusan" required
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('jurusan.index') }}" class="text-cyan-400 hover:text-white transition">
                        &larr; Kembali
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-cyan-500 text-white font-bold rounded-xl shadow-lg hover:bg-cyan-600 transition duration-200 transform hover:scale-105">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>