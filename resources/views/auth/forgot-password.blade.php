<x-guest-layout>
    <!-- Redesigned forgot password with new logo and improved layout -->
    <div class="w-full max-w-md">
        <!-- Mobile Logo -->
        <div class="lg:hidden text-center mb-10">
            <div class="w-24 h-24 mx-auto mb-4">
                <img src="/images/professional-20educational-20data-management-20logo-20with-20radial-20design.png" 
                     alt="EduData Logo" 
                     class="w-full h-full object-contain">
            </div>
            <h1 class="text-2xl font-bold text-white">EduData</h1>
        </div>

        <!-- Header -->
        <div class="mb-10">
            <div class="w-14 h-14 rounded-2xl bg-white/[0.06] flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-white tracking-tight">Reset Password</h2>
            <p class="text-white/50 mt-2 leading-relaxed">Masukkan email Anda dan kami akan mengirimkan link untuk reset password</p>
        </div>

        <!-- Card -->
        <div class="glass-card-elevated rounded-3xl p-8">
            <x-auth-session-status class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-white/70 text-sm font-medium mb-2.5">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30" 
                           placeholder="nama@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full btn-primary py-4 rounded-xl text-sm font-semibold">
                    Kirim Link Reset
                </button>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm text-white/50 hover:text-white transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        Kembali ke login
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-white/30 text-sm mt-8">
            &copy; {{ date('Y') }} EduData. All rights reserved.
        </p>
    </div>
</x-guest-layout>
