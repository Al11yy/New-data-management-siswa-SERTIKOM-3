<x-app-layout>
    <div class="page-wrapper">
        <div class="max-w-md mx-auto">
            <!-- Simple Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('user_management.index') }}" class="p-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition">
                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Edit User</h1>
                        <p class="text-white/50 text-sm">Update user information</p>
                    </div>
                </div>
            </div>

            <!-- Simple Form -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-6">
                <form action="{{ route('user_management.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Profile Picture -->
                    <div class="mb-6 text-center">
                        <div class="relative inline-block mb-4">
                            @if($user->photo)
                                <img src="{{ asset('storage/'.$user->photo) }}" 
                                     class="w-20 h-20 rounded-full object-cover border-2 border-white/10">
                            @else
                                <div class="w-20 h-20 rounded-full bg-white/10 flex items-center justify-center border-2 border-white/10">
                                    <span class="text-white text-xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="photo" class="block w-full text-sm text-white/70 file:mr-4 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-white/10 file:text-white">
                    </div>

                    <!-- Simple Form Fields -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-white/70 text-sm mb-2">Name</label>
                            <input type="text" 
                                   name="name" 
                                   value="{{ $user->name }}" 
                                   required 
                                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/30 focus:border-white/20 outline-none transition">
                        </div>

                        <div>
                            <label class="block text-white/70 text-sm mb-2">Email</label>
                            <input type="email" 
                                   name="email" 
                                   value="{{ $user->email }}" 
                                   required 
                                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/30 focus:border-white/20 outline-none transition">
                        </div>

                        <div>
                            <label class="block text-white/70 text-sm mb-2">New Password (Optional)</label>
                            <input type="password" 
                                   name="password" 
                                   placeholder="Leave blank to keep current"
                                   class="w-full px-4 py-3 rounded-lg border border-white/10 bg-white/5 text-white placeholder:text-white/30 focus:border-white/20 outline-none transition">
                        </div>
                    </div>

                    <!-- Simple Action Buttons -->
                    <div class="flex gap-3 mt-8 pt-6 border-t border-white/10">
                        <a href="{{ route('user_management.index') }}" 
                           class="flex-1 py-3 rounded-lg bg-white/5 border border-white/10 text-white/70 text-center hover:bg-white/10 transition">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="flex-1 py-3 rounded-lg bg-white text-black font-medium hover:bg-white/90 transition">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
