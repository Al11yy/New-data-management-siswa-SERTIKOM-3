<x-app-layout>
    <div class="p-6 lg:p-8">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('jurusan.index') }}" class="p-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition">
                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Edit Jurusan</h1>
                        <p class="text-white/70 text-sm">Perbarui informasi jurusan</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6">
                <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <!-- Kode Jurusan -->
                        <div>
                            <label class="block text-white font-medium mb-2">Kode Jurusan</label>
                            <input type="text" 
                                   name="kode_jurusan" 
                                   value="{{ $jurusan->kode_jurusan }}" 
                                   required 
                                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                                   placeholder="Contoh: TKJ">
                            <p class="text-white/60 text-xs mt-1">Masukkan kode unik jurusan</p>
                        </div>

                        <!-- Nama Jurusan -->
                        <div>
                            <label class="block text-white font-medium mb-2">Nama Jurusan</label>
                            <input type="text" 
                                   name="nama_jurusan" 
                                   value="{{ $jurusan->nama_jurusan }}" 
                                   required 
                                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                                   placeholder="Contoh: Teknik Komputer Jaringan">
                            <p class="text-white/60 text-xs mt-1">Masukkan nama lengkap jurusan</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-8 pt-6 border-t border-white/10">
                        <a href="{{ route('jurusan.index') }}" 
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