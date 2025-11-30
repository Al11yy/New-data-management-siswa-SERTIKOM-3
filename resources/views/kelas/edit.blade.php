<x-app-layout>
    <!-- Redesigned kelas edit form with glassmorphism -->
    <div class="p-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('kelas.index') }}" class="inline-flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors duration-200 mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-2xl font-bold text-white tracking-tight">Edit Kelas</h1>
                <p class="text-white/50 mt-1">Perbarui informasi kelas</p>
            </div>

            <!-- Form Card -->
            <div class="glass-card rounded-2xl p-8">
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Nama Kelas</label>
                            <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required class="w-full glass-input rounded-xl text-black p-3.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Level Kelas</label>
                            <select name="level_kelas" required class="w-full glass-input rounded-xl text-black p-3.5 text-sm appearance-none cursor-pointer">
                                <option value="10" @if($kelas->level_kelas == '10') selected @endif class="bg-[#ffffff]">10</option>
                                <option value="11" @if($kelas->level_kelas == '11') selected @endif class="bg-[#ffffff]">11</option>
                                <option value="12" @if($kelas->level_kelas == '12') selected @endif class="bg-[#ffffff]">12</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-white/70 text-sm font-medium mb-2">Jurusan</label>
                            <select name="jurusan_id" required class="w-full glass-input rounded-xl text-black p-3.5 text-sm appearance-none cursor-pointer">
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" @if($kelas->jurusan_id == $jurusan->id) selected @endif class="bg-[#ffffff]">{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-white/[0.06]">
                        <a href="{{ route('kelas.index') }}" class="btn-secondary px-6 py-2.5 rounded-xl text-sm">Batal</a>
                        <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
