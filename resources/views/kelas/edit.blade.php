<x-app-layout>
    <div class="p-6">
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8">
            <h1 class="text-3xl font-extrabold text-white mb-8">Edit Kelas</h1>

            <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_kelas" class="block text-slate-300 text-sm font-bold mb-2">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" required value="{{ $kela->nama_kelas }}"
                            class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition">
                    </div>
                    <div>
                        <label for="level_kelas" class="block text-slate-300 text-sm font-bold mb-2">Level Kelas</label>
                        <div class="relative">
                            <select name="level_kelas" id="level_kelas" required
                                class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                <option value="10" @if($kela->level_kelas == '10') selected @endif class="bg-slate-800">10</option>
                                <option value="11" @if($kela->level_kelas == '11') selected @endif class="bg-slate-800">11</option>
                                <option value="12" @if($kela->level_kelas == '12') selected @endif class="bg-slate-800">12</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label for="jurusan_id" class="block text-slate-300 text-sm font-bold mb-2">Jurusan</label>
                        <div class="relative">
                            <select name="jurusan_id" id="jurusan_id" required
                                class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" @if($kela->jurusan_id == $jurusan->id) selected @endif class="bg-slate-800">
                                        {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('kelas.index') }}" class="text-cyan-400 hover:text-white transition">
                        &larr; Kembali
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-cyan-500 text-white font-bold rounded-xl shadow-lg hover:bg-cyan-600 transition duration-200 transform hover:scale-105">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>