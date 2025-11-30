<!-- Enhanced profile form with better styling -->
<section>
    <header class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </div>
            <h2 class="text-xl font-semibold text-white">Informasi Profile</h2>
        </div>
        <p class="text-white/50 text-sm">Perbarui nama dan alamat email akun Anda.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-white/70 text-sm font-medium mb-2.5">Nama</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm">
            <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-white/70 text-sm font-medium mb-2.5">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm">
            <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 rounded-xl bg-amber-500/10 border border-amber-500/20">
                    <p class="text-sm text-amber-400">
                        Email Anda belum terverifikasi.
                        <button form="send-verification" class="text-amber-300 hover:text-amber-200 underline transition-colors duration-200">Klik untuk kirim ulang link verifikasi.</button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-emerald-400">Link verifikasi baru telah dikirim ke email Anda.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn-primary px-6 py-3 rounded-xl text-sm">Simpan Perubahan</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-400">Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
