<x-guest-layout>
    <div class="min-h-screen relative flex items-center justify-center bg-black text-white overflow-hidden">
        <!-- Background layers (glass / iOS style) -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-neutral-950 via-black to-neutral-900 opacity-90"></div>
            <div class="absolute -top-32 -left-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -right-10 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 w-full max-w-md px-6">
            <!-- Brand Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl flex items-center justify-center shadow-xl">
                        <img src="{{ asset('images/Logojir.png') }}" 
                             alt="Logo" 
                             class="w-8 h-8 object-contain">
                    </div>
                    <div class="text-left">
                        <h1 class="text-xl font-bold text-white">SMK Pesat</h1>
                        <p class="text-sm text-white/60">Sistem Administrasi Sekolah</p>
                    </div>
                </div>
            </div>

            <!-- Login Card -->
            <div class="rounded-3xl border border-white/10 bg-white/5 backdrop-blur-2xl shadow-2xl p-8">
                <!-- Card Header -->
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-white mb-2">Masuk ke Akun</h2>
                    <p class="text-sm text-white/60">
                        Gunakan kredensial Anda untuk mengakses sistem
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status 
                    class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm text-center" 
                    :status="session('status')" 
                />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-xs font-medium text-white/70 mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <input id="email"
                                   type="email"
                                   name="email"
                                   :value="old('email')"
                                   required
                                   autofocus
                                   class="w-full px-4 py-3.5 rounded-2xl border border-white/10 bg-white/5 text-sm text-white placeholder:text-white/35 outline-none backdrop-blur-xl focus:border-white/40 focus:ring-1 focus:ring-white/40 transition"
                                   placeholder="nama@email.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-xs font-medium text-white/70 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   class="w-full px-4 py-3.5 rounded-2xl border border-white/10 bg-white/5 text-sm text-white placeholder:text-white/35 outline-none backdrop-blur-xl focus:border-white/40 focus:ring-1 focus:ring-white/40 transition"
                                   placeholder="Masukkan password">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between text-xs">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="w-4 h-4 rounded border-white/20 bg-white/5 text-white focus:ring-white/50 focus:ring-offset-0">
                            <span class="text-white/70">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-white/60 hover:text-white transition">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="mt-2 w-full inline-flex items-center justify-center rounded-xl border border-white/20 bg-white text-sm font-medium text-black shadow-lg hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-black transition py-2.5">
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <p class="text-xs text-white/40">
                    &copy; {{ date('Y') }} SMK Pesat. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>