<x-app-layout>
    <!-- Enhanced user management with avatar cards -->
    <div class="p-6 lg:p-10">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white tracking-tight">User Management</h1>
            <p class="text-white/50 mt-1">Kelola semua pengguna sistem</p>
        </div>

        <!-- User Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="glass-card rounded-3xl p-6 group hover:bg-white/[0.04] transition-all duration-300">
                    <div class="flex items-start gap-4">
                        @if($user->photo)
                            <img src="{{ asset('storage/'.$user->photo) }}" class="w-16 h-16 rounded-2xl object-cover ring-2 ring-white/[0.08]">
                        @else
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500/20 to-purple-500/20 flex items-center justify-center ring-2 ring-white/[0.08]">
                                <span class="text-white font-bold text-xl">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-white truncate">{{ $user->name }}</h3>
                            <p class="text-white/50 text-sm truncate">{{ $user->email }}</p>
                            <div class="mt-4">
                                <a href="{{ route('user_management.edit', $user->id) }}" class="btn-secondary px-4 py-2 rounded-xl text-xs inline-flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    Edit User
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
