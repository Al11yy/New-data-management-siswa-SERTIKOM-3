<x-app-layout>
    <!-- Redesigned user management edit form with glassmorphism -->
    <div class="p-8">
        <div class="max-w-xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('user_management.index') }}" class="inline-flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors duration-200 mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-2xl font-bold text-white tracking-tight">Edit User</h1>
                <p class="text-white/50 mt-1">Perbarui informasi pengguna</p>
            </div>

            <!-- Form Card -->
            <div class="glass-card rounded-2xl p-8">
                <form action="{{ route('user_management.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Photo -->
                    <div class="mb-6">
                        <label class="block text-white/70 text-sm font-medium mb-3">Foto Profil</label>
                        <div class="flex items-center gap-4">
                            @if($user->photo)
                                <img src="{{ asset('storage/'.$user->photo) }}" class="w-16 h-16 rounded-full object-cover ring-2 ring-white/10">
                            @else
                                <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center ring-2 ring-white/10">
                                    <span class="text-white/60 font-semibold text-lg">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <input type="file" name="photo" class="text-white/70 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-white/10 file:text-white hover:file:bg-white/20 file:cursor-pointer file:transition-colors">
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Nama</label>
                            <input type="text" name="name" value="{{ $user->name }}" required class="w-full glass-input rounded-xl text-white p-3.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required class="w-full glass-input rounded-xl text-white p-3.5 text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-white/[0.06]">
                        <a href="{{ route('user_management.index') }}" class="btn-secondary px-6 py-2.5 rounded-xl text-sm">Batal</a>
                        <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
