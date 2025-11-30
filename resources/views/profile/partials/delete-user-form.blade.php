<section class="space-y-6">
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-white">Delete Account</h2>
        <p class="text-white/50 text-sm mt-1">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
    </header>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="btn-danger px-6 py-2.5 rounded-xl text-sm">Delete Account</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-[#141414]">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-white mb-2">Are you sure you want to delete your account?</h2>
            <p class="text-white/50 text-sm mb-6">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.</p>

            <div class="mb-6">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" class="w-full glass-input rounded-xl text-white p-3.5 text-sm placeholder:text-white/30">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400 text-sm" />
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="btn-secondary px-6 py-2.5 rounded-xl text-sm">Cancel</button>
                <button type="submit" class="btn-danger px-6 py-2.5 rounded-xl text-sm">Delete Account</button>
            </div>
        </form>
    </x-modal>
</section>
