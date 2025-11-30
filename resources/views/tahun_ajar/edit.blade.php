<x-app-layout>
    <!-- Redesigned tahun ajar edit form with glassmorphism -->
    <div class="p-8">
        <div class="max-w-xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('tahun_ajar.index') }}" class="inline-flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors duration-200 mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-2xl font-bold text-white tracking-tight">Edit Tahun Ajar</h1>
                <p class="text-white/50 mt-1">Perbarui informasi tahun ajaran</p>
            </div>

            <!-- Form Card -->
            <div class="glass-card rounded-2xl p-8">
                <form action="{{ route('tahun_ajar.update', $tahunAjar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Kode Tahun Ajar</label>
                            <input type="text" name="kode_tahun_ajar" value="{{ $tahunAjar->kode_tahun_ajar }}" required class="w-full glass-input rounded-xl text-black p-3.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Nama Tahun Ajar</label>
                            <input type="text" name="nama_tahun_ajar" value="{{ $tahunAjar->nama_tahun_ajar }}" required class="w-full glass-input rounded-xl text-black p-3.5 text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-white/[0.06]">
                        <a href="{{ route('tahun_ajar.index') }}" class="btn-secondary px-6 py-2.5 rounded-xl text-sm">Batal</a>
                        <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
