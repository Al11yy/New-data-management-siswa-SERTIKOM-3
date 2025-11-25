<x-app-layout>
    <div class="p-6" x-data="{ showFilter: false }">

        <!-- Hero Section -->
        <div class="mb-8 relative bg-slate-800/50 backdrop-blur-xl border border-white/20 rounded-2xl shadow-xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                <div class="p-8 md:p-12">
                    <h1 class="text-4xl font-extrabold text-white">Welcome back,</h1>
                    <h2 class="text-4xl font-extrabold text-cyan-400 mt-1">{{ Auth::user()->name }}! 👋</h2>
                    <p class="text-slate-300 mt-4 text-lg">Here's your school's snapshot. Ready to dive in?</p>
                </div>
                <div class="relative h-full min-h-[200px] md:min-h-0">
                    <!-- Placeholder background -->
                    <div class="absolute inset-0 bg-cyan-900/20"></div>
                    <!-- Placeholder decorative elements -->
                    <svg class="absolute bottom-0 right-0 w-96 h-96 text-cyan-500/5 -mr-24 -mb-24" fill="currentColor" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path d="M36.6,-53.9C49.8,-49.3,64.3,-43.8,72.3,-33.8C80.3,-23.8,81.8,-9.3,78.4,3.6C75,16.5,66.7,27.8,57.5,38.2C48.2,48.6,38,58.1,26.3,64.9C14.6,71.7,1.4,75.8,-12.9,74.5C-27.2,73.2,-42.6,66.5,-54.9,55.8C-67.2,45.1,-76.4,30.4,-79.9,14.1C-83.4,-2.2,-81.2,-20.1,-72.8,-34.4C-64.4,-48.7,-49.8,-59.4,-35.4,-65.2C-21,-71,-6.8,-71.9,6.5,-68.9C19.8,-65.9,33.2,-58.5,36.6,-53.9Z" transform="translate(100 100)"></path>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="border-2 border-dashed border-slate-500/50 rounded-xl p-8 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-slate-500/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-slate-400">Image Placeholder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-4 auto-rows-[192px] gap-6">

            <!-- Total Siswa -->
            <div class="lg:col-span-1 p-6 bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 flex flex-col justify-between transition duration-300 hover:bg-white/20">
                <p class="text-white/70 text-sm">Total Siswa</p>
                <p class="text-5xl font-extrabold text-white">{{ $total_siswa }}</p>
            </div>

            <!-- Total Kelas -->
            <div class="lg:col-span-1 p-6 bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 flex flex-col justify-between transition duration-300 hover:bg-white/20">
                <p class="text-white/70 text-sm">Total Kelas</p>
                <p class="text-5xl font-extrabold text-white">{{ $total_kelas }}</p>
            </div>

            <!-- Total Jurusan -->
            <div class="lg:col-span-1 p-6 bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 flex flex-col justify-between transition duration-300 hover:bg-white/20">
                <p class="text-white/70 text-sm">Total Jurusan</p>
                <p class="text-5xl font-extrabold text-white">{{ $total_jurusan }}</p>
            </div>

            <!-- Total Tahun Ajar -->
            <div class="lg:col-span-1 p-6 bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 flex flex-col justify-between transition duration-300 hover:bg-white/20">
                <p class="text-white/70 text-sm">Total Tahun Ajar</p>
                <p class="text-5xl font-extrabold text-white">{{ $total_tahun }}</p>
            </div>

            <!-- Grafik -->
            <div class="lg:col-span-2 lg:row-span-2 bg-white/10 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/20 flex flex-col">
                <h2 class="text-xl font-bold mb-4 text-white">
                    Grafik Penambahan Siswa 7 Hari Terakhir
                </h2>
                <div class="flex-grow p-4 rounded-xl bg-slate-900/50">
                    <canvas id="chartSiswa"></canvas>
                </div>
            </div>

            <!-- Aktivitas Terakhir -->
            <div class="lg:col-span-2 lg:row-span-2 bg-white/10 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-white/20 flex flex-col">
                <h2 class="text-xl font-bold mb-4 text-white">Aktivitas Terakhir 🕒</h2>
                <div class="space-y-3 overflow-y-auto flex-grow">
                    @foreach ($aktivitas as $log)
                        <div class="p-3 bg-slate-800/50 backdrop-blur-sm rounded-xl border border-white/10">
                            <p class="text-white font-medium text-sm">{{ $log['aksi'] }}</p>
                            <p class="text-xs text-cyan-400">{{ $log['waktu'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Siswa Terbaru -->
            <div class="lg:col-span-3 lg:row-span-2 bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 flex flex-col">
                <div class="flex justify-between items-center p-6">
                    <h2 class="text-xl font-bold text-white">Siswa Terbaru 👇</h2>
                    <button @click="showFilter = true" class="p-2 bg-slate-800/50 rounded-xl border border-white/10 hover:bg-slate-700/50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="overflow-x-auto flex-grow">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-white/5 text-white">
                            <tr>
                                <th class="p-4 font-semibold">Nama Siswa</th>
                                <th class="p-4 font-semibold">NISN</th>
                                <th class="p-4 font-semibold">Kelas</th>
                                <th class="p-4 font-semibold">Jurusan</th>
                                <th class="p-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-300">
                            @foreach ($siswa_baru as $s)
                                <tr class="border-t border-white/10 hover:bg-white/5 transition duration-150">
                                    <td class="p-4">{{ $s->nama_lengkap }}</td>
                                    <td class="p-4">{{ $s->nisn }}</td>
                                    <td class="p-4">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                                    <td class="p-4">{{ $s->jurusan->nama_jurusan ?? '-' }}</td>
                                    <td class="p-4 text-right">
                                        <a href="{{ route('siswa.edit', $s->id) }}" class="text-cyan-400 hover:text-cyan-300 font-medium">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Aksi Cepat -->
            <div class="lg:col-span-1 lg:row-span-2 bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-6 flex flex-col">
                <h2 class="text-xl font-bold text-white mb-4">Aksi Cepat ⚡</h2>
                <div class="flex flex-col gap-4 flex-grow justify-center">
                    <a href="{{ route('siswa.create') }}" class="w-full text-center px-5 py-3 bg-cyan-500 text-white font-medium rounded-xl shadow-lg hover:bg-cyan-600 transition duration-200 transform hover:scale-105">+ Tambah Siswa</a>
                    <a href="{{ route('kelas.create') }}" class="w-full text-center px-5 py-3 bg-green-500 text-white font-medium rounded-xl shadow-lg hover:bg-green-600 transition duration-200 transform hover:scale-105">+ Tambah Kelas</a>
                    <a href="{{ route('jurusan.create') }}" class="w-full text-center px-5 py-3 bg-violet-500 text-white font-medium rounded-xl shadow-lg hover:bg-violet-600 transition duration-200 transform hover:scale-105">+ Tambah Jurusan</a>
                    <a href="{{ route('tahun_ajar.create') }}" class="w-full text-center px-5 py-3 bg-orange-500 text-white font-medium rounded-xl shadow-lg hover:bg-orange-600 transition duration-200 transform hover:scale-105">+ Tambah Tahun Ajar</a>
                </div>
            </div>
        </div>

        <!-- Filter Modal -->
        <div x-show="showFilter" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center" x-cloak>
            <div @click.away="showFilter = false" class="bg-slate-800/80 backdrop-blur-xl border border-white/20 rounded-2xl shadow-xl w-full max-w-lg p-6" x-data="{ filterType: '{{ request('filter_type', '') }}' }">
                <h3 class="text-xl font-bold text-white mb-4">Filter Siswa</h3>
                <form action="{{ route('dashboard') }}" method="GET" class="space-y-4">
                    <div>
                        <label for="filter_type" class="block text-sm font-medium text-slate-300 mb-2">Filter Berdasarkan</label>
                        <select name="filter_type" id="filter_type" x-model="filterType" class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                            <option value="" class="bg-slate-800">Pilih Tipe...</option>
                            <option value="jurusan_id" class="bg-slate-800">Jurusan</option>
                            <option value="kelas_id" class="bg-slate-800">Kelas</option>
                            <option value="jenis_kelamin" class="bg-slate-800">Jenis Kelamin</option>
                        </select>
                    </div>
                    <div>
                        <label for="filter_value" class="block text-sm font-medium text-slate-300 mb-2">Nilai Filter</label>
                        <template x-if="filterType === 'jurusan_id'">
                            <select name="filter_value" class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" {{ request('filter_value') == $jurusan->id ? 'selected' : '' }} class="bg-slate-800">{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </template>
                        <template x-if="filterType === 'kelas_id'">
                            <select name="filter_value" class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas->id }}" {{ request('filter_value') == $kelas->id ? 'selected' : '' }} class="bg-slate-800">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </template>
                        <template x-if="filterType === 'jenis_kelamin'">
                            <select name="filter_value" class="w-full bg-slate-700/50 border border-white/20 rounded-xl text-white p-3 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition appearance-none">
                                <option value="laki-laki" {{ request('filter_value') == 'laki-laki' ? 'selected' : '' }} class="bg-slate-800">Laki-laki</option>
                                <option value="perempuan" {{ request('filter_value') == 'perempuan' ? 'selected' : '' }} class="bg-slate-800">Perempuan</option>
                            </select>
                        </template>
                        <template x-if="!filterType">
                            <div class="text-slate-400 p-3 border border-dashed border-white/20 rounded-xl h-[50px] flex items-center">Pilih tipe filter terlebih dahulu.</div>
                        </template>
                    </div>
                    <div class="flex gap-3 pt-4">
                        <button type="submit" class="w-full px-5 py-3 bg-cyan-500 text-white font-medium rounded-xl shadow-lg hover:bg-cyan-600 transition duration-200">Terapkan</button>
                        <a href="{{ route('dashboard') }}" class="w-full text-center px-5 py-3 bg-slate-600 text-white font-medium rounded-xl shadow-lg hover:bg-slate-700 transition duration-200">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartSiswa');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($grafik_label),
                datasets: [{
                    label: 'Penambahan Siswa',
                    data: @json($grafik_data),
                    borderWidth: 3,
                    tension: 0.4,
                    borderColor: '#06B6D4', // Electric Cyan
                    backgroundColor: 'rgba(6, 182, 212, 0.1)',
                    fill: true,
                    pointBackgroundColor: '#06B6D4',
                    pointBorderColor: '#0F172A',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#06B6D4'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255, 255, 255, 0.1)' },
                        ticks: { color: '#94a3b8' } // text-slate-400
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#94a3b8' } // text-slate-400
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</x-app-layout>