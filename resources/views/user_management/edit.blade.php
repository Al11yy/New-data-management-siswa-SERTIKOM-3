<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold text-white mb-6">Edit User</h1>

        <form action="{{ route('user_management.update', $user->id) }}"
              method="POST" enctype="multipart/form-data"
              class="bg-white/10 p-6 rounded-xl border border-white/20">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="text-white">Foto</label>
                <div class="flex items-center gap-4 mt-2">
                    @if($user->photo)
                        <img src="{{ asset('storage/'.$user->photo) }}" class="w-16 h-16 rounded-full">
                    @else
                        <div class="w-16 h-16 bg-gray-500 rounded-full flex items-center justify-center text-xs text-white">
                            N/A
                        </div>
                    @endif

                    <input type="file" name="photo"
                           class="text-white bg-white/5 border border-white/20 rounded-lg p-2 w-60">
                </div>
            </div>

            <div class="mb-4">
                <label class="text-white">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}"
                class="w-full mt-1 p-2 bg-white/5 border border-white/20 text-white rounded-lg">
            </div>

            <div class="mb-4">
                <label class="text-white">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                class="w-full mt-1 p-2 bg-white/5 border border-white/20 text-white rounded-lg">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('user_management.index') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg">
                    Batal
                </a>

                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</x-app-layout>
