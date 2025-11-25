<x-app-layout>
    <div class="p-6">

        <h1 class="text-3xl font-bold text-white mb-6">User Management</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-500/20 border border-green-500/30 text-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-white/20">
            <table class="w-full text-left text-sm text-white">
                <thead class="bg-white/15">
                    <tr>
                        <th class="p-3">Foto</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b border-white/10 hover:bg-white/5 transition">

                            <td class="p-3">
                                @if($user->photo)
                                    <img src="{{ asset('storage/'.$user->photo) }}" class="w-10 h-10 rounded-full">
                                @else
                                    <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center text-xs">
                                        N/A
                                    </div>
                                @endif
                            </td>

                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>

                            <td class="p-3">
                                <a href="{{ route('user_management.edit', $user->id) }}"
                                    class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                     Edit
                                 </a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
