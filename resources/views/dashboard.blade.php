<x-app-layout>
  <div class="p-6 lg:p-10" x-data="{ showFilter: false, filterType: '{{ request('filter_type', '') }}' }">

    <!-- HERO (Modern Glass, unchanged look) -->
    <header class="mb-8 relative rounded-3xl overflow-hidden border border-white/10 bg-gradient-to-br from-slate-900/40 via-slate-800/20 to-slate-900/10 backdrop-blur-xl shadow-2xl">
      <!-- subtle glows -->
      <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -left-24 -top-20 w-64 h-64 bg-cyan-500/20 blur-3xl rounded-full"></div>
        <div class="absolute -right-24 -bottom-20 w-72 h-72 bg-violet-500/10 blur-3xl rounded-full"></div>
      </div>

      <div class="relative z-10 grid md:grid-cols-2 gap-6 p-8 md:p-12 items-center">
        <div>
          <p class="text-sm text-white/40 mb-2">Dashboard Sekolah</p>
          <h1 class="text-3xl md:text-4xl font-extrabold text-white">
            Welcome back, 
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-300 to-violet-300">
              {{ Auth::user()->name }}
            </span> 👋
          </h1>
          <p class="mt-3 text-slate-300">
            {{ collect([
                "Hope you're having a productive day!",
                "Let’s manage some data like a pro today 🚀",
                "Ready to take control of your school system?",
                "Everything looks good. Let’s continue your journey!",
                "Your dashboard is all set. Let’s dive in!"
            ])->random() }}
          </p>

          <div class="mt-4 text-sm text-white/30">
            {{ now()->translatedFormat('l, d F Y · H:i') }} WIB
          </div>
        </div>

        <div class="flex items-center justify-end md:justify-center">
          <div class="relative">
            <div class="absolute -inset-1 rounded-full bg-gradient-to-br from-cyan-400/30 to-purple-500/20 blur-xl"></div>
            @if(Auth::user()->photo)
              <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="avatar"
                   class="relative w-36 h-36 md:w-44 md:h-44 rounded-full object-cover ring-4 ring-white/10 shadow-2xl">
            @else
              <div class="relative w-36 h-36 md:w-44 md:h-44 rounded-full bg-slate-700 border border-white/10 flex items-center justify-center text-4xl text-white/70 shadow-2xl">
                {{ substr(Auth::user()->name, 0, 1) }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </header>

    <!-- STATS GRID (take icons & style from user-provided bento) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
      <!-- Total Siswa -->
      <div class="stat-card rounded-3xl p-6 group relative overflow-hidden bg-white/5 backdrop-blur-md border border-white/8 shadow-lg">
        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-blue-500/10 transition-all duration-500"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">
              <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM20.25 8.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
              </svg>
            </div>
          </div>
          <p class="text-4xl lg:text-5xl font-bold text-white tracking-tight">{{ $total_siswa }}</p>
          <p class="text-white/50 text-sm mt-2">Total Siswa</p>
        </div>
      </div>

      <!-- Total Kelas -->
      <div class="stat-card rounded-3xl p-6 group relative overflow-hidden bg-white/5 backdrop-blur-md border border-white/8 shadow-lg">
        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-emerald-500/10 transition-all duration-500"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
              <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
              </svg>
            </div>
          </div>
          <p class="text-4xl lg:text-5xl font-bold text-white tracking-tight">{{ $total_kelas }}</p>
          <p class="text-white/50 text-sm mt-2">Total Kelas</p>
        </div>
      </div>

      <!-- Total Jurusan -->
      <div class="stat-card rounded-3xl p-6 group relative overflow-hidden bg-white/5 backdrop-blur-md border border-white/8 shadow-lg">
        <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-amber-500/10 transition-all duration-500"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center">
              <svg class="w-6 h-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5z" />
              </svg>
            </div>
          </div>
          <p class="text-4xl lg:text-5xl font-bold text-white tracking-tight">{{ $total_jurusan }}</p>
          <p class="text-white/50 text-sm mt-2">Program Studi</p>
        </div>
      </div>

      <!-- Total Tahun Ajar -->
      <div class="stat-card rounded-3xl p-6 group relative overflow-hidden bg-white/5 backdrop-blur-md border border-white/8 shadow-lg">
        <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/5 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-purple-500/10 transition-all duration-500"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center">
              <svg class="w-6 h-6 text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
              </svg>
            </div>
          </div>
          <p class="text-4xl lg:text-5xl font-bold text-white tracking-tight">{{ $total_tahun }}</p>
          <p class="text-white/50 text-sm mt-2">Tahun Ajar</p>
        </div>
      </div>
    </div>

    <!-- MAIN GRID: Chart | Aktivitas (right) | Siswa Baru | Aksi Cepat as Sidebar (A) -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-6">

      <!-- Chart (wide) -->
      <div class="lg:col-span-7 col-span-1 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/8 shadow-lg flex flex-col">
        <div class="flex items-start justify-between mb-4">
          <h3 class="text-lg md:text-xl font-bold text-white">Grafik Penambahan Siswa — 7 Hari Terakhir</h3>
          <span class="text-sm text-white/30">Realtime</span>
        </div>

        <div class="flex-grow p-4 rounded-xl bg-slate-900/50 border border-white/5">
          <canvas id="chartSiswa" class="w-full h-72"></canvas>
        </div>
      </div>

      <!-- Aktivitas Terakhir (styled from user-provided activity feed) -->
      <div class="lg:col-span-5 col-span-1 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/8 shadow-lg flex flex-col">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-bold text-white">Aktivitas Terakhir</h3>
          <a href="#" class="text-sm text-white/40">Lihat semua</a>
        </div>

        <div class="space-y-3 overflow-y-auto">
          @forelse ($aktivitas as $log)
            <div class="p-3 rounded-xl bg-slate-800/50 border border-white/6 flex items-center gap-3">
              <div class="w-9 h-9 rounded-lg bg-white/[0.03] flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm text-white font-medium leading-tight truncate">{{ $log['aksi'] }}</p>
                <p class="text-xs text-white/30 mt-1">{{ $log['waktu'] }}</p>
              </div>
            </div>
          @empty
            <div class="p-3 text-slate-400">Belum ada aktivitas.</div>
          @endforelse
        </div>
      </div>

      <!-- Siswa Terbaru -->
      <div class="lg:col-span-8 col-span-1 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/8 shadow-lg">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-bold text-white">Siswa Terbaru</h3>
          <div class="flex items-center gap-3">
            <button @click="showFilter = true" class="p-2 rounded-lg bg-slate-800/50 border border-white/10 hover:bg-slate-700/50 transition">
              <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h18M6 7h12M9 11h6" /></svg>
            </button>
            <a href="{{ route('siswa.index') }}" class="px-3 py-2 rounded-md bg-slate-700/50 text-white/90 hover:bg-slate-700 transition">Lihat Semua</a>
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left text-sm">
            <thead class="bg-white/5 text-white">
              <tr>
                <th class="p-3 font-semibold">Nama</th>
                <th class="p-3 font-semibold">NISN</th>
                <th class="p-3 font-semibold">Kelas</th>
                <th class="p-3 font-semibold">Jurusan</th>
                <th class="p-3 font-semibold text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              @forelse ($siswa_baru as $s)
                <tr class="border-t border-white/8 hover:bg-white/3 transition">
                  <td class="p-3">{{ $s->nama_lengkap }}</td>
                  <td class="p-3 font-mono">{{ $s->nisn }}</td>
                  <td class="p-3">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                  <td class="p-3">{{ $s->jurusan->nama_jurusan ?? '-' }}</td>
                  <td class="p-3 text-right">
                    <a href="{{ route('siswa.edit', $s->id) }}" class="text-cyan-400 font-medium hover:text-cyan-300">Edit</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="p-4 text-slate-400">Belum ada siswa terbaru.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Aksi Cepat Sidebar (A) -->
      <aside class="lg:col-span-4 col-span-1 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/8 shadow-lg flex flex-col gap-4">
        <h3 class="text-lg font-bold text-white">Aksi Cepat ⚡</h3>

        <div class="grid grid-cols-1 gap-3">


            <a href="{{ route('siswa.create') }}" 
            class="flex items-center gap-3 p-4 rounded-2xl bg-white/[0.02] border border-white/[0.04] 
                    hover:bg-white/[0.05] hover:border-white/[0.08] transition">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 
                            flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                </div>

                <div class="flex-1">
                    <div class="text-white font-medium">Tambah Siswa</div>
                    <div class="text-xs text-white/40">Input data siswa baru</div>
                </div>
            </a>

          <a href="{{ route('kelas.create') }}" class="flex items-center gap-3 p-4 rounded-2xl bg-white/[0.02] border border-white/[0.04] hover:bg-white/[0.05] hover:border-white/[0.08] transition">
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">
              <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </div>
            <div class="flex-1">
              <div class="text-white font-medium">Tambah Kelas</div>
              <div class="text-xs text-white/40">Buat & atur kelas</div>
            </div>
          </a>

          <a href="{{ route('jurusan.create') }}" class="flex items-center gap-3 p-4 rounded-2xl bg-white/[0.02] border border-white/[0.04] hover:bg-white/[0.05] hover:border-white/[0.08] transition">
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center">
              <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </div>
            <div class="flex-1">
              <div class="text-white font-medium">Tambah Jurusan</div>
              <div class="text-xs text-white/40">Tambah program studi</div>
            </div>
          </a>

          <a href="{{ route('tahun_ajar.create') }}" class="flex items-center gap-3 p-4 rounded-2xl bg-white/[0.02] border border-white/[0.04] hover:bg-white/[0.05] hover:border-white/[0.08] transition">
            <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center">
              <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </div>
            <div class="flex-1">
              <div class="text-white font-medium">Tahun Ajar</div>
              <div class="text-xs text-white/40">Kelola tahun ajar</div>
            </div>
          </a>
        </div>
      </aside>
    </section>

    <!-- FILTER MODAL (merged style: user modal) -->
    <div x-show="showFilter" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4" 
         x-cloak>
      <div @click.away="showFilter = false" 
           x-transition:enter="transition ease-out duration-300"
           x-transition:enter-start="opacity-0 scale-95"
           x-transition:enter-end="opacity-100 scale-100"
           class="w-full max-w-md rounded-3xl p-8 bg-slate-800/90 backdrop-blur-xl border border-white/10">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-semibold text-white">Filter Data</h3>
          <button @click="showFilter = false" class="p-2 rounded-xl hover:bg-white/[0.06] transition-colors duration-200">
            <svg class="w-5 h-5 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <form action="{{ route('dashboard') }}" method="GET" class="space-y-5">
          <div>
            <label class="block text-white/60 text-sm font-medium mb-2.5">Filter Berdasarkan</label>
            <select name="filter_type" x-model="filterType" class="w-full glass-input rounded-xl text-white p-4 text-sm bg-slate-700/60 border border-white/10">
              <option value="" class="bg-[#141416]">Pilih Tipe...</option>
              <option value="jurusan_id" class="bg-[#141416]">Jurusan</option>
              <option value="kelas_id" class="bg-[#141416]">Kelas</option>
              <option value="jenis_kelamin" class="bg-[#141416]">Jenis Kelamin</option>
            </select>
          </div>

          <div>
            <label class="block text-white/60 text-sm font-medium mb-2.5">Nilai Filter</label>
            <template x-if="filterType === 'jurusan_id'">
              <select name="filter_value" class="w-full glass-input rounded-xl text-white p-4 text-sm bg-slate-700/60 border border-white/10">
                @foreach($jurusans as $jurusan)
                  <option value="{{ $jurusan->id }}" {{ request('filter_value') == $jurusan->id ? 'selected' : '' }} class="bg-[#141416]">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
            </template>

            <template x-if="filterType === 'kelas_id'">
              <select name="filter_value" class="w-full glass-input rounded-xl text-white p-4 text-sm bg-slate-700/60 border border-white/10">
                @foreach($kelasList as $kelas)
                  <option value="{{ $kelas->id }}" {{ request('filter_value') == $kelas->id ? 'selected' : '' }} class="bg-[#141416]">{{ $kelas->nama_kelas }}</option>
                @endforeach
              </select>
            </template>

            <template x-if="filterType === 'jenis_kelamin'">
              <select name="filter_value" class="w-full glass-input rounded-xl text-white p-4 text-sm bg-slate-700/60 border border-white/10">
                <option value="laki-laki" class="bg-[#141416]">Laki-laki</option>
                <option value="perempuan" class="bg-[#141416]">Perempuan</option>
              </select>
            </template>
          </div>

          <div class="flex gap-3 pt-2">
            <button type="button" @click="showFilter = false" class="flex-1 btn-secondary px-5 py-3 rounded-xl text-sm bg-slate-700 text-white">Batal</button>
            <button type="submit" class="flex-1 btn-primary px-5 py-3 rounded-xl text-sm bg-cyan-500 text-white">Terapkan</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Chart.js init (uses chartLabels & chartData) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      (function () {
        const canvas = document.getElementById('chartSiswa');
        if (!canvas) return;

        const labels = @json($chartLabels ?? []);
        const dataPoints = @json($chartData ?? []);

        const ctx = canvas.getContext('2d');

        if (window._siswaChart instanceof Chart) {
          window._siswaChart.destroy();
        }

        window._siswaChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Penambahan Siswa',
              data: dataPoints,
              borderWidth: 3,
              tension: 0.35,
              borderColor: '#06B6D4',
              backgroundColor: 'rgba(6,182,212,0.12)',
              fill: true,
              pointRadius: 4,
              pointHoverRadius: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true,
                grid: { color: 'rgba(255,255,255,0.06)' },
                ticks: { color: '#94a3b8' }
              },
              x: {
                grid: { display: false },
                ticks: { color: '#94a3b8' }
              }
            },
            plugins: {
              legend: { display: false },
              tooltip: {
                backgroundColor: '#0f172a',
                titleColor: '#fff',
                bodyColor: '#e2e8f0'
              }
            }
          }
        });
      })();
    </script>

  </div>
</x-app-layout>
