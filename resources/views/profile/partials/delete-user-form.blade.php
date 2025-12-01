<section class="bg-white/5 border border-white/10 rounded-xl p-6 mt-6">
    <header class="mb-6">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-white">Hapus Akun</h2>
                <p class="text-white/60 text-sm mt-1">Tindakan ini tidak dapat dibatalkan</p>
            </div>
        </div>
    </header>

    <p class="text-white/70 text-sm mb-6">
        Setelah akun dihapus, semua data dan resource akan dihapus secara permanen. 
        Harap konfirmasi dengan memasukkan password Anda.
    </p>

    <button x-data="" 
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" 
            class="px-6 py-3 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 hover:bg-red-500/20 hover:text-red-300 transition">
        Hapus Akun
    </button>

    <!-- Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6 bg-slate-900 border border-white/10 rounded-xl">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-red-500/10 border border-red-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-white">Konfirmasi Penghapusan Akun</h2>
                    <p class="text-white/60 text-sm mt-1">Tindakan ini bersifat permanen</p>
                </div>
            </div>

            <p class="text-white/70 text-sm mb-6">
                Apakah Anda yakin ingin menghapus akun Anda? Semua data akan dihapus secara permanen.
                Harap masukkan password Anda untuk mengkonfirmasi.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-white font-medium mb-2">Password</label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           placeholder="Masukkan password Anda" 
                           class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition">
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3">
                    <button type="button" 
                            x-on:click="$dispatch('close')" 
                            class="px-6 py-3 rounded-lg bg-white/5 border border-white/10 text-white/70 hover:bg-white/10 hover:text-white transition">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                        Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>