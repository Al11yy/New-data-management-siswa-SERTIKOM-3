<x-guest-layout>
    <!-- Redesigned login with modern card layout -->
    <div class="w-full max-w-md">
        <!-- Mobile Logo -->
        <div class="lg:hidden text-center mb-10">
            <div class="w-24 h-24 mx-auto mb-4">
                <img src="resources/views/public/images/Logojir.png" 
                     alt="EduData Logo" 
                     class="w-full h-full object-contain">
            </div>
            <h1 class="text-2xl font-bold text-white">Smk Pesat</h1>
        </div>

        <!-- Header -->
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-white tracking-tight">Selamat Datang</h2>
            <p class="text-white/50 mt-2">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- Card -->
        <div class="glass-card-elevated rounded-3xl p-8">
            <x-auth-session-status class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-white/70 text-sm font-medium mb-2.5">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30 focus:ring-2 focus:ring-blue-500/20" 
                           placeholder="nama@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-white/70 text-sm font-medium mb-2.5">Password</label>
                    <input id="password" type="password" name="password" required 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30 focus:ring-2 focus:ring-blue-500/20" 
                           placeholder="Masukkan password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" 
                               class="w-4 h-4 rounded bg-white/[0.06] border-white/10 text-blue-500 focus:ring-blue-500/30 focus:ring-offset-0">
                        <span class="text-sm text-white/60">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-white/50 hover:text-white transition-colors duration-200">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full btn-primary py-4 rounded-xl text-sm font-semibold mt-2">
                    Masuk ke Dashboard
                </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-white/30 text-sm mt-8">
            &copy; {{ date('Y') }} EduData. All rights reserved.
        </p>
    </div>
</x-guest-layout>
