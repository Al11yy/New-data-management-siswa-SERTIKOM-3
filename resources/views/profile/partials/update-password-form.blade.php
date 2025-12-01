<section class="bg-white/5 border border-white/10 rounded-xl p-6 mt-6">
    <header class="mb-6">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-white">Update Password</h2>
                <p class="text-white/60 text-sm mt-1">Pastikan password Anda aman dan kuat</p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="block text-white font-medium mb-2">Password Saat Ini</label>
            <input id="update_password_current_password" 
                   name="current_password" 
                   type="password" 
                   autocomplete="current-password" 
                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                   placeholder="Masukkan password saat ini">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="block text-white font-medium mb-2">Password Baru</label>
            <input id="update_password_password" 
                   name="password" 
                   type="password" 
                   autocomplete="new-password" 
                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                   placeholder="Masukkan password baru">
            <p class="text-white/50 text-xs mt-2">Minimal 8 karakter</p>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-white font-medium mb-2">Konfirmasi Password</label>
            <input id="update_password_password_confirmation" 
                   name="password_confirmation" 
                   type="password" 
                   autocomplete="new-password" 
                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                   placeholder="Masukkan ulang password baru">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400 text-xs" />
        </div>

        <!-- Update Button -->
        <div class="pt-4">
            <button type="submit" 
                    class="px-6 py-3 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition">
                Update Password
            </button>
            
            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                     class="inline-flex items-center gap-2 ml-4 text-sm text-emerald-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Password berhasil diperbarui
                </div>
            @endif
        </div>
    </form>
</section>