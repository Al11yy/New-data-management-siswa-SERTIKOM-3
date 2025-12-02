<x-app-layout>
    <div class="p-6 lg:p-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('kelas.index') }}" class="p-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition">
                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Edit Kelas</h1>
                        <p class="text-white/70 text-sm">Perbarui informasi kelas</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6">
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Kelas -->
                        <div>
                            <label class="block text-white font-medium mb-2">Nama Kelas</label>
                            <input type="text" 
                                   name="nama_kelas" 
                                   value="{{ $kelas->nama_kelas }}" 
                                   required 
                                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                                   placeholder="Contoh: X TKJ 1">
                            <p class="text-white/60 text-xs mt-1">Masukkan nama kelas</p>
                        </div>

                        <!-- Level Kelas -->
                        <div>
                            <label class="block text-black font-medium mb-2">Level Kelas</label>
                            <select name="level_kelas" 
                                    required 
                                    class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-black focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                                <option value="10" @if($kelas->level_kelas == '10') selected @endif>10</option>
                                <option value="11" @if($kelas->level_kelas == '11') selected @endif>11</option>
                                <option value="12" @if($kelas->level_kelas == '12') selected @endif>12</option>
                            </select>
                            <p class="text-white/60 text-xs mt-1">Pilih tingkat kelas</p>
                        </div>

                        <!-- Jurusan -->
                        <div class="md:col-span-2">
                            <label class="block text-white font-medium mb-2">Jurusan</label>
                            <select name="jurusan_id" 
                                    required 
                                    class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition cursor-pointer">
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" @if($kelas->jurusan_id == $jurusan->id) selected @endif>
                                        {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-white/60 text-xs mt-1">Pilih jurusan untuk kelas ini</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-8 pt-6 border-t border-white/10">
                        <a href="{{ route('kelas.index') }}" 
                           class="flex-1 py-3 rounded-lg bg-white/5 border border-white/10 text-white/70 text-center hover:bg-white/10 hover:text-white transition">
                            Batal
                        </a>
                        <button type="submit" 
                                class="flex-1 py-3 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>