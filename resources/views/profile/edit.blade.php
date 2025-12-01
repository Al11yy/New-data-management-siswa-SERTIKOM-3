<x-app-layout>
    <!-- Enhanced profile edit with modern sections -->
    <div class="page-wrapper">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-white tracking-tight">Pengaturan Profile</h1>
                <p class="text-white/50 mt-1">Kelola informasi akun dan preferensi Anda</p>
            </div>

            <div class="space-y-6">
                <!-- Profile Information -->
                <div class="glass-card-elevated rounded-3xl p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Update Password -->
                <div class="glass-card-elevated rounded-3xl p-8">
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Delete Account -->
                <div class="glass-card rounded-3xl p-8 border border-red-500/10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
