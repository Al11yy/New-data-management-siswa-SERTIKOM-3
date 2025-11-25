<x-app-layout>
    <div class="p-6">

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 text-green-300 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-white">Daftar Tahun Ajar</h1>
            <a href="{{ route('tahun_ajar.create') }}"
                class="px-5 py-2 bg-sky-500 text-white font-medium rounded-xl shadow-lg hover:bg-sky-600 transition duration-200 transform hover:scale-105">
                + Tambah Tahun Ajar
            </a>
        </div>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 overflow-hidden">
            <table class="w-full text-left text-sm text-white">
                <thead class="bg-white/15">
                    <tr>
                        <th class="p-4">Kode</th>
                        <th class="p-4">Nama Tahun Ajar</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahunAjars as $item)
                        <tr class="border-b border-white/10 hover:bg-white/5 transition duration-150">
                            <td class="p-4">{{ $item->kode_tahun_ajar }}</td>
                            <td class="p-4">{{ $item->nama_tahun_ajar }}</td>
                            <td class="p-4 text-right">
                                <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block">
                                    <button @click="open = !open" class="text-white/70 hover:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                    <div x-show="open" x-transition class="absolute right-0 w-40 bg-gray-800/90 backdrop-blur-xl border border-white/20 rounded-lg shadow-lg z-10 @if($loop->last) bottom-full mb-2 @else mt-2 @endif">
                                        <a href="{{ route('tahun_ajar.edit', $item->id) }}" class="block px-4 py-2 text-sm text-white hover:bg-white/20 w-full text-left rounded-t-lg">Edit</a>
                                        <form action="{{ route('tahun_ajar.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="block px-4 py-2 text-sm text-red-400 hover:bg-white/20 w-full text-left rounded-b-lg">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>