<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-white">Update Password</h2>
        <p class="text-white/50 text-sm mt-1">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-white/70 text-sm font-medium mb-2">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="w-full glass-input rounded-xl text-white p-3.5 text-sm">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400 text-sm" />
        </div>

        <div>
            <label for="update_password_password" class="block text-white/70 text-sm font-medium mb-2">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="w-full glass-input rounded-xl text-white p-3.5 text-sm">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400 text-sm" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-white/70 text-sm font-medium mb-2">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="w-full glass-input rounded-xl text-white p-3.5 text-sm">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400 text-sm" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm">Update Password</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-emerald-400">Saved.</p>
            @endif
        </div>
    </form>
</section>
