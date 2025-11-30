<x-guest-layout>
    <!-- Redesigned register with new logo and improved layout -->
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
            <h2 class="text-3xl font-bold text-white tracking-tight">Buat Akun Baru</h2>
            <p class="text-white/50 mt-2">Daftar untuk mengakses sistem pendataan</p>
        </div>

        <!-- Card -->
        <div class="glass-card-elevated rounded-3xl p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-white/70 text-sm font-medium mb-2.5">Nama Lengkap</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30" 
                           placeholder="Masukkan nama lengkap">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-white/70 text-sm font-medium mb-2.5">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30" 
                           placeholder="nama@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-white/70 text-sm font-medium mb-2.5">Password</label>
                    <input id="password" type="password" name="password" required 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30" 
                           placeholder="Buat password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-white/70 text-sm font-medium mb-2.5">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                           class="w-full glass-input rounded-xl text-white px-4 py-4 text-sm placeholder:text-white/30" 
                           placeholder="Ulangi password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full btn-primary py-4 rounded-xl text-sm font-semibold mt-2">
                    Daftar Sekarang
                </button>

                <div class="text-center pt-2">
                    <a href="{{ route('login') }}" class="text-sm text-white/50 hover:text-white transition-colors duration-200">
                        Sudah punya akun? <span class="text-white/80 font-medium">Masuk</span>
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
