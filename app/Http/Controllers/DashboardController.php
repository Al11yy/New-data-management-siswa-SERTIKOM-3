<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\tahun_ajar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- STATISTIK UTAMA ---
        $total_siswa = Siswa::count();
        $total_kelas = Kelas::count();
        $total_jurusan = Jurusan::count();
        $total_tahun = tahun_ajar::count();

        // --- 1. GRAFIK PENAMBAHAN SISWA 7 HARI TERAKHIR ---
        $days = collect();
        $counts = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->format('Y-m-d');

            $days->push(Carbon::today()->subDays($i)->format('d M'));
            $counts->push(
                Siswa::whereDate('created_at', $date)->count()
            );
        }

        // --- 2. LOG AKTIVITAS ---
        $limit = 5;

        $aktivitasSiswa = Siswa::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at)
                ? 'Menambah siswa'
                : 'Memperbarui siswa';

            return [
                'aksi' => "$aksi: $item->nama_lengkap",
                'waktu' => $item->updated_at,
            ];
        });

        $aktivitasKelas = Kelas::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at)
                ? 'Menambah kelas'
                : 'Memperbarui kelas';

            return [
                'aksi' => "$aksi: $item->nama_kelas",
                'waktu' => $item->updated_at,
            ];
        });

        $aktivitasJurusan = Jurusan::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at)
                ? 'Menambah jurusan'
                : 'Memperbarui jurusan';

            return [
                'aksi' => "$aksi: $item->nama_jurusan",
                'waktu' => $item->updated_at,
            ];
        });

        $aktivitasTahunAjar = tahun_ajar::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at)
                ? 'Menambah tahun ajar'
                : 'Memperbarui tahun ajar';

            return [
                'aksi' => "$aksi: $item->nama_tahun_ajar",
                'waktu' => $item->updated_at,
            ];
        });

        // gabungkan, sort, ambil 5 terbaru
        $aktivitas = collect()
            ->merge($aktivitasSiswa)
            ->merge($aktivitasKelas)
            ->merge($aktivitasJurusan)
            ->merge($aktivitasTahunAjar)
            ->sortByDesc('waktu')
            ->take(5)
            ->map(function ($item) {
                $item['waktu'] = $item['waktu']->diffForHumans();
                return $item;
            });

        // --- 3. DATA SISWA BARU ---
        $siswaQuery = Siswa::with(['kelas', 'jurusan']);

        if ($request->filled('filter_type') && $request->filled('filter_value')) {
            $siswaQuery->where($request->filter_type, $request->filter_value);
        }

        $siswa_baru = $siswaQuery->latest()->take(5)->get();

        // --- 4. STATISTIK TAMBAHAN ---
        $statistik = [
            'rata_siswa_per_kelas' => $total_kelas ? round($total_siswa / $total_kelas, 1) : 0,

            'jurusan_terpopuler' => Jurusan::withCount('siswa')
                ->orderBy('siswa_count', 'DESC')
                ->first()
                ->nama_jurusan ?? '-',

            'kelas_terbesar' => Kelas::withCount('siswa')
                ->orderBy('siswa_count', 'DESC')
                ->first()
                ->nama_kelas ?? '-',

            'kehadiran' => 94,
            'nilai_rata2' => 82,
            'jumlah_guru' => 48,
        ];

        return view('dashboard', [
            'total_siswa'   => $total_siswa,
            'total_kelas'   => $total_kelas,
            'total_jurusan' => $total_jurusan,
            'total_tahun'   => $total_tahun,

            'siswa_baru' => $siswa_baru,
            'aktivitas'  => $aktivitas,
            'statistik'  => $statistik,

            // PENTING: kirim data chart dengan nama yang dipakai di view
            'chartLabels' => $days->toArray(),
            'chartData'   => $counts->toArray(),

            'jurusans'  => Jurusan::all(),
            'kelasList' => Kelas::all(),
        ]);
    }
}
