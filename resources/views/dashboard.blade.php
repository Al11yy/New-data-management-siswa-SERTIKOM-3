<x-app-layout>

    <div class="p-6">

        <!-- Title -->
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Dashboard Admin</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">

            <div class="p-5 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-300 text-sm">Total Siswa</p>
                <p class="text-3xl font-bold mt-2">{{ $total_siswa }}</p>
            </div>

            <div class="p-5 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-300 text-sm">Total Kelas</p>
                <p class="text-3xl font-bold mt-2">{{ $total_kelas }}</p>
            </div>

            <div class="p-5 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-300 text-sm">Total Jurusan</p>
                <p class="text-3xl font-bold mt-2">{{ $total_jurusan }}</p>
            </div>

            <div class="p-5 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-300 text-sm">Total Tahun Ajar</p>
                <p class="text-3xl font-bold mt-2">{{ $total_tahun }}</p>
            </div>

        </div>

        <!-- Grafik + Aktivitas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <!-- Grafik -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 md:col-span-2">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                    Grafik Penambahan Siswa 7 Hari Terakhir
                </h2>

                <canvas id="chartSiswa" height="80"></canvas>
            </div>

            <!-- Aktivitas -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Aktivitas Terakhir</h2>

                @foreach ($aktivitas as $log)
                    <div class="mb-4 p-3 bg-gray-700/40 rounded-lg">
                        <p class="text-gray-100 font-medium">{{ $log['aksi'] }}</p>
                        <p class="text-sm text-gray-400">{{ $log['waktu'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Siswa Baru + Quick Action Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Siswa Terbaru</h2>

            <div class="flex gap-2">
                <a href="{{ route('siswa.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    + Siswa
                </a>

                <a href="{{ route('kelas.create') }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                    + Kelas
                </a>

                <a href="{{ route('jurusan.create') }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
                    + Jurusan
                </a>

                <a href="{{ route('tahun_ajar.create') }}"
                    class="px-4 py-2 bg-orange-600 text-white rounded-lg shadow hover:bg-orange-700">
                    + Tahun
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="p-3">Nama Siswa</th>
                        <th class="p-3">NISN</th>
                        <th class="p-3">Kelas</th>
                        <th class="p-3">Jurusan</th>
                        <th class="p-3 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-gray-800 dark:text-gray-200">
                    @foreach ($siswa_baru as $s)
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-3">{{ $s->nama_lengkap }}</td>
                            <td class="p-3">{{ $s->nisn }}</td>
                            <td class="p-3">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                            <td class="p-3">{{ $s->jurusan->nama_jurusan ?? '-' }}</td>
                            <td class="p-3 text-right">
                                <a href="{{ route('siswa.edit', $s->id) }}" class="text-blue-500">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- ChartJS -->
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
                    borderColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

</x-app-layout>
