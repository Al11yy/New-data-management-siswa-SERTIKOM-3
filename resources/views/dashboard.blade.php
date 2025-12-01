<x-app-layout>
  <div class="page-wrapper lg:py-12 space-y-8" x-data="{ showFilter: false, filterType: '{{ request('filter_type', '') }}' }">

     <!-- HERO / OVERVIEW -->
  <section class="relative overflow-hidden rounded-[32px] border border-white/5 bg-[#050505] px-8 py-10">
      <div class="absolute inset-0 opacity-70">
          <div class="absolute -top-20 -right-10 w-72 h-72 bg-cyan-500/30 blur-[140px] rounded-full"></div>
          <div class="absolute -bottom-24 -left-10 w-80 h-80 bg-purple-500/30 blur-[160px] rounded-full"></div>
      </div>

      <div class="relative grid gap-10 lg:grid-cols-5 items-center">
          <div class="lg:col-span-3 space-y-6">
              <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full border border-white/10 bg-white/5 text-white/70 text-sm">
                  <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                  Dashboard Administrator
              </div>
              <div>
                  <p class="text-sm uppercase tracking-[0.3em] text-white/40 mb-4">Selamat Datang</p>
                  <h1 class="text-4xl lg:text-5xl font-semibold text-white leading-tight">
                      Hai, <span class="text-white">{{ Auth::user()->name }}</span>
                  </h1>
              </div>
              <p class="text-lg text-white/60 max-w-2xl">
                  {{ collect([
                      "Kelola semua data akademik sekolah dengan sistem terintegrasi yang modern dan efisien.",
                      "Monitor perkembangan siswa dan aktivitas sekolah melalui dashboard yang user-friendly.",
                      "Akses cepat ke informasi penting untuk pengambilan keputusan yang lebih baik.",
                      "Sistem manajemen sekolah yang terpadu untuk administrasi yang lebih optimal.",
                      "Platform komprehensif untuk mengelola semua aspek akademik sekolah."
                  ])->random() }}
              </p>
              <div class="flex flex-wrap items-center gap-4 text-white/70">
                  <div class="flex items-center gap-2 text-sm">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6l3 3m6-3A9 9 0 1112 3a9 9 0 019 9z" />
                      </svg>
                      {{ now()->translatedFormat('l, d F Y - H:i') }} WIB
                  </div>
                  <div class="h-4 w-px bg-white/20 hidden sm:block"></div>
                  <span class="text-sm text-white/50">Sistem terintegrasi real-time</span>
              </div>
          </div>

          <div class="lg:col-span-2 flex justify-center lg:justify-end">
              <!-- Larger Profile Picture -->
              <div class="relative group">
                  <div class="absolute -inset-6 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-all"></div>
                  @if(Auth::user()->photo)
                      <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="avatar"
                          class="relative w-40 h-40 md:w-48 md:h-48 rounded-3xl object-cover border-4 border-white/10 shadow-2xl group-hover:border-white/20 transition-all">
                  @else
                      <div class="relative w-40 h-40 md:w-48 md:h-48 rounded-3xl bg-slate-700 flex items-center justify-center text-4xl md:text-5xl font-bold text-white border-4 border-white/10 shadow-2xl group-hover:border-white/20 transition-all">
                          {{ substr(Auth::user()->name, 0, 1) }}
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </section>

    <!-- QUICK STATS -->
    <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
      @php
        $statCards = [
          [
            'label' => 'Total Siswa',
            'value' => $total_siswa,
            'accent' => 'from-cyan-400/40 to-cyan-600/10',
            'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'
          ],
          [
            'label' => 'Total Kelas',
            'value' => $total_kelas,
            'accent' => 'from-blue-400/40 to-blue-600/10',
            'icon' => 'M2.25 21h19.5M6 21v-4.5a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 16.5V21M4.5 7.5h15M3 4.5h18M7.5 10.5v6m9-6v6'
          ],
          [
            'label' => 'Total Jurusan',
            'value' => $total_jurusan,
            'accent' => 'from-amber-400/40 to-amber-600/10',
            'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347M4.26 10.147a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814M6.75 15V9.318A55.38 55.38 0 0112 8.443'
          ],
          [
            'label' => 'Total Tahun ajar',
            'value' => $total_tahun,
            'accent' => 'from-emerald-400/40 to-emerald-600/10',
            'icon' => 'M6.75 3v2.25M17.25 3v2.25M3 9h18M3 9A2.25 2.25 0 015.25 6.75h13.5A2.25 2.25 0 0121 9m-18 0v9.75A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V9'
          ]
        ];
      @endphp

      @foreach ($statCards as $card)
        <div class="relative group overflow-hidden rounded-[28px] border border-white/5 bg-white/5 backdrop-blur-2xl p-6">
          <div class="absolute inset-0 bg-gradient-to-br {{ $card['accent'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          <div class="relative flex flex-col gap-4">
            <div class="flex items-center justify-between">
              <p class="text-white/60 text-sm">{{ $card['label'] }}</p>
              <div class="w-11 h-11 rounded-2xl bg-white/10 flex items-center justify-center border border-white/10">
                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}" />
                </svg>
              </div>
            </div>
            <p class="text-4xl font-semibold text-white tracking-tight">{{ $card['value'] }}</p>
            <div class="flex items-center gap-2 text-xs text-white/40">
              <span class="w-1.5 h-1.5 rounded-full bg-white/40"></span>
              Data tersinkronisasi
            </div>
          </div>
        </div>
      @endforeach
    </section>

    <!-- MAIN BENTO -->
    <section class="grid grid-cols-1 xl:grid-cols-12 gap-6">
      <div class="xl:col-span-8 rounded-[28px] border border-white/5 bg-white/5 backdrop-blur-2xl p-6">
        <div class="flex flex-wrap items-start justify-between gap-4 mb-6">
          <div>
            <h3 class="text-2xl text-white font-semibold">Grafik Penambahan Siswa</h3>
            <p class="text-white/50 text-sm mt-1">Data rolling 7 hari terakhir</p>
          </div>
          <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 text-xs text-white/70">
            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
            Live update
          </span>
        </div>
        <div class="rounded-2xl border border-white/5 bg-black/30 p-4">
          <canvas id="chartSiswa" class="w-full h-72"></canvas>
        </div>
      </div>

      <div class="xl:col-span-4 rounded-[28px] border border-white/5 bg-white/5 backdrop-blur-2xl p-6 flex flex-col">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-semibold text-white">Aktivitas Terbaru</h3>
          <span class="text-xs text-white/40">5 log terakhir</span>
        </div>
        <div class="space-y-4 overflow-y-auto pr-2 max-h-80">
          @forelse ($aktivitas as $log)
            <div class="rounded-2xl border border-white/5 bg-white/5 p-4 flex items-start gap-3">
              <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-white/20 to-white/5 flex items-center justify-center text-sm text-white/80 border border-white/10">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="flex-1 min-w-0 text-white">
                <p class="font-medium leading-snug">{{ $log['aksi'] }}</p>
                <p class="text-xs text-white/40 mt-1">{{ $log['waktu'] }}</p>
              </div>
            </div>
          @empty
            <div class="text-center py-10 text-white/50">
              <p>Belum ada aktivitas</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <section class="grid grid-cols-1 xl:grid-cols-12 gap-6">
      <div class="xl:col-span-7 rounded-[28px] border border-white/5 bg-white/5 backdrop-blur-2xl p-6">
        <div class="flex items-center justify-between flex-wrap gap-3 mb-6">
          <div>
            <p class="text-sm text-white/40 uppercase tracking-[0.3em]">Timeline</p>
            <h3 class="text-2xl text-white font-semibold">Siswa Terbaru</h3>
          </div>
          <div class="flex items-center gap-2">
            <button @click="showFilter = true" class="p-3 rounded-2xl border border-white/10 bg-white/5 text-white hover:bg-white/10 transition">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h18M6 9h12M9 13.5h6" />
              </svg>
            </button>
            <a href="{{ route('siswa.index') }}" class="px-4 py-3 rounded-2xl border border-white/10 bg-white/10 text-sm text-white/80 hover:text-white transition">
              Semua Siswa
            </a>
          </div>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-white/5">
          <table class="w-full text-sm text-white/80">
            <thead class="bg-white/5 text-left text-white">
              <tr>
                <th class="px-4 py-3 font-semibold">Nama</th>
                <th class="px-4 py-3 font-semibold">NISN</th>
                <th class="px-4 py-3 font-semibold">Kelas</th>
                <th class="px-4 py-3 font-semibold">Jurusan</th>
                <th class="px-4 py-3 font-semibold text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
              @forelse ($siswa_baru as $s)
                <tr class="hover:bg-white/5 transition">
                  <td class="px-4 py-3 text-white">{{ $s->nama_lengkap }}</td>
                  <td class="px-4 py-3 font-mono">{{ $s->nisn }}</td>
                  <td class="px-4 py-3">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                  <td class="px-4 py-3">{{ $s->jurusan->nama_jurusan ?? '-' }}</td>
                  <td class="px-4 py-3 text-right">
                    <a href="{{ route('siswa.edit', $s->id) }}" class="text-cyan-300 hover:text-cyan-200 font-medium">Edit</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="px-4 py-10 text-center text-white/40">Belum ada siswa terbaru</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <div class="xl:col-span-5 space-y-6">
        <div class="rounded-[28px] border border-white/5 bg-white/5 backdrop-blur-2xl p-6">
          <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl text-white font-semibold">Aksi Cepat</h3>
            <span class="text-xs text-white/40">Kelola data</span>
          </div>
          <div class="grid gap-4">
            <a href="{{ route('siswa.create') }}" class="flex items-center gap-4 rounded-2xl border border-white/5 bg-gradient-to-r from-white/15 to-white/5 p-4 hover:border-white/20 transition">
              <div class="w-12 h-12 rounded-2xl border border-white/10 bg-white/10 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
              </div>
              <div>
                <p class="text-white font-medium">Tambah Siswa</p>
                <p class="text-xs text-white/40">Input data baru</p>
              </div>
            </a>
            <a href="{{ route('kelas.create') }}" class="flex items-center gap-4 rounded-2xl border border-white/5 bg-white/5 p-4 hover:border-white/20 transition">
              <div class="w-12 h-12 rounded-2xl border border-white/10 bg-white/10 flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </div>
              <div>
                <p class="text-white font-medium">Tambah Kelas</p>
                <p class="text-xs text-white/40">Buat atau sesuaikan kelas</p>
              </div>
            </a>
            <a href="{{ route('jurusan.create') }}" class="flex items-center gap-4 rounded-2xl border border-white/5 bg-white/5 p-4 hover:border-white/20 transition">
              <div class="w-12 h-12 rounded-2xl border border-white/10 bg-white/10 flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </div>
              <div>
                <p class="text-white font-medium">Tambah Jurusan</p>
                <p class="text-xs text-white/40">Kelola program keahlian</p>
              </div>
            </a>
            <a href="{{ route('tahun_ajar.create') }}" class="flex items-center gap-4 rounded-2xl border border-white/5 bg-white/5 p-4 hover:border-white/20 transition">
              <div class="w-12 h-12 rounded-2xl border border-white/10 bg-white/10 flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </div>
              <div>
                <p class="text-white font-medium">Kelola Tahun Ajar</p>
                <p class="text-xs text-white/40">Atur periode ajar</p>
              </div>
            </a>
          </div>
        </div>

      </div>
    </section>

    <!-- FILTER MODAL -->
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
           class="w-full max-w-md rounded-3xl bg-slate-800/90 backdrop-blur-xl border border-white/10 shadow-2xl">
        <div class="flex items-center justify-between p-6 border-b border-white/10">
          <h3 class="text-xl font-semibold text-white">Filter Data</h3>
          <button @click="showFilter = false" class="p-2 rounded-xl hover:bg-white/10 transition-colors">
            <svg class="w-5 h-5 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <form action="{{ route('dashboard') }}" method="GET" class="p-6 space-y-6">
          <div>
            <label class="block text-white/60 text-sm font-medium mb-3">Filter Berdasarkan</label>
            <select name="filter_type" x-model="filterType" class="w-full rounded-xl bg-white/5 border border-white/10 text-white p-4 focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30">
              <option value="">Pilih Tipe...</option>
              <option value="jurusan_id">Jurusan</option>
              <option value="kelas_id">Kelas</option>
              <option value="jenis_kelamin">Jenis Kelamin</option>
            </select>
          </div>

          <div>
            <label class="block text-white/60 text-sm font-medium mb-3">Nilai Filter</label>
            <template x-if="filterType === 'jurusan_id'">
              <select name="filter_value" class="w-full rounded-xl bg-white/5 border border-white/10 text-white p-4 focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30">
                @foreach($jurusans as $jurusan)
                  <option value="{{ $jurusan->id }}" {{ request('filter_value') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
            </template>

            <template x-if="filterType === 'kelas_id'">
              <select name="filter_value" class="w-full rounded-xl bg-white/5 border border-white/10 text-white p-4 focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30">
                @foreach($kelasList as $kelas)
                  <option value="{{ $kelas->id }}" {{ request('filter_value') == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                @endforeach
              </select>
            </template>

            <template x-if="filterType === 'jenis_kelamin'">
              <select name="filter_value" class="w-full rounded-xl bg-white/5 border border-white/10 text-white p-4 focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30">
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </template>
          </div>

          <div class="flex gap-3 pt-2">
            <button type="button" @click="showFilter = false" class="flex-1 px-5 py-3 rounded-xl text-sm bg-white/5 text-white border border-white/10 hover:bg-white/10 transition-colors">Batal</button>
            <button type="submit" class="flex-1 px-5 py-3 rounded-xl text-sm bg-cyan-500/20 text-cyan-400 border border-cyan-400/30 hover:bg-cyan-500/30 transition-colors">Terapkan</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Chart.js init -->
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

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(6, 182, 212, 0.3)');
        gradient.addColorStop(1, 'rgba(6, 182, 212, 0.05)');

        window._siswaChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Penambahan Siswa',
              data: dataPoints,
              borderWidth: 3,
              tension: 0.4,
              borderColor: '#06b6d4',
              backgroundColor: gradient,
              fill: true,
              pointRadius: 5,
              pointHoverRadius: 7,
              pointBackgroundColor: '#06b6d4',
              pointBorderColor: '#0f172a',
              pointBorderWidth: 2
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true,
                grid: { color: 'rgba(255,255,255,0.1)' },
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
                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                titleColor: '#f8fafc',
                bodyColor: '#e2e8f0',
                borderColor: '#334155',
                borderWidth: 1,
                cornerRadius: 12,
                displayColors: false
              }
            }
          }
        });
      })();
    </script>

  </div>
</x-app-layout>
