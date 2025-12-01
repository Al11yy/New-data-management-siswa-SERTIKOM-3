<section class="bg-white/5 border border-white/10 rounded-xl p-6">
    <header class="mb-6">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-white">Informasi Profil</h2>
                <p class="text-white/60 text-sm mt-1">Perbarui nama dan email akun Anda</p>
            </div>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-white font-medium mb-2">Nama Lengkap</label>
            <input id="name" 
                   name="name" 
                   type="text" 
                   value="{{ old('name', $user->name) }}" 
                   required 
                   autofocus 
                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                   placeholder="Masukkan nama lengkap">
            <x-input-error class="mt-2 text-red-400 text-xs" :messages="$errors->get('name')" />
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-white font-medium mb-2">Alamat Email</label>
            <input id="email" 
                   name="email" 
                   type="email" 
                   value="{{ old('email', $user->email) }}" 
                   required 
                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/40 focus:border-white/20 focus:ring-1 focus:ring-white/20 outline-none transition"
                   placeholder="nama@email.com">
            <x-input-error class="mt-2 text-red-400 text-xs" :messages="$errors->get('email')" />
        </div>

        <!-- Email Verification Status -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="p-4 rounded-lg bg-amber-500/10 border border-amber-500/20">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-amber-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm text-amber-400">
                            Email Anda belum terverifikasi.
                        </p>
                        <button form="send-verification" 
                                class="mt-2 text-sm text-amber-300 hover:text-amber-200 underline transition-colors">
                            Kirim ulang link verifikasi
                        </button>
                        
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm text-emerald-400">
                                Link verifikasi baru telah dikirim ke email Anda.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <!-- Save Button -->
        <div class="pt-4">
            <button type="submit" 
                    class="px-6 py-3 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition">
                Simpan Perubahan
            </button>
            
            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                     class="inline-flex items-center gap-2 ml-4 text-sm text-emerald-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Tersimpan
                </div>
            @endif
        </div>
    </form>
</section>