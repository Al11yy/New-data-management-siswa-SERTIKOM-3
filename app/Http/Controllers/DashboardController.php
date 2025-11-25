<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\tahun_ajar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        // --- 2. LOG AKTIVITAS TERAKHIR (SEMUA MODEL) ---
        $limit = 5; // Ambil 5 aktivitas terakhir dari tiap model untuk di-merge

        $aktivitasSiswa = Siswa::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at) ? 'Menambah siswa' : 'Memperbarui siswa';
            return [
                'aksi' => "$aksi: $item->nama_lengkap",
                'waktu' => $item->updated_at,
            ];
        });

        $aktivitasKelas = Kelas::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at) ? 'Menambah kelas' : 'Memperbarui kelas';
            return [
                'aksi' => "$aksi: $item->nama_kelas",
                'waktu' => $item->updated_at,
            ];
        });

        $aktivitasJurusan = Jurusan::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at) ? 'Menambah jurusan' : 'Memperbarui jurusan';
            return [
                'aksi' => "$aksi: $item->nama_jurusan",
                'waktu' => $item->updated_at,
            ];
        });

        $aktivitasTahunAjar = tahun_ajar::latest('updated_at')->take($limit)->get()->map(function ($item) {
            $aksi = $item->created_at->equalTo($item->updated_at) ? 'Menambah tahun ajar' : 'Memperbarui tahun ajar';
            return [
                'aksi' => "$aksi: $item->nama_tahun_ajar",
                'waktu' => $item->updated_at,
            ];
        });

        // Gabungkan semua aktivitas, urutkan, dan ambil 5 teratas
        $aktivitas = $aktivitasSiswa
            ->merge($aktivitasKelas)
            ->merge($aktivitasJurusan)
            ->merge($aktivitasTahunAjar)
            ->sortByDesc('waktu')
            ->take(5)
            ->map(function ($item) {
                // Format waktu untuk ditampilkan
                $item['waktu'] = $item['waktu']->diffForHumans();
                return $item;
            });


        // --- 3. SISWA TERBARU (DENGAN FILTER) ---
        $siswaQuery = Siswa::with(['kelas', 'jurusan']);

        if ($request->filled('filter_type') && $request->filled('filter_value')) {
            $type = $request->input('filter_type');
            $value = $request->input('filter_value');

            if ($type === 'jurusan_id') {
                $siswaQuery->where('jurusan_id', $value);
            } elseif ($type === 'kelas_id') {
                $siswaQuery->where('kelas_id', $value);
            } elseif ($type === 'jenis_kelamin') {
                $siswaQuery->where('jenis_kelamin', $value);
            }
        }

        $siswa_baru = $siswaQuery->latest()->take(5)->get();


        // --- 4. STATISTIK SEKOLAH – REAL + FIX ---
        $statistik = [
            'rata_siswa_per_kelas' => $total_kelas ? round($total_siswa / $total_kelas, 1) : 0,

            // jurusan terpopuler berdasarkan jumlah siswa
            'jurusan_terpopuler' => Jurusan::withCount('siswa')
                ->orderBy('siswa_count', 'DESC') // Note: Laravel 9+ uses snake_case `model_count`
                ->first()
                ->nama_jurusan ?? '-',

            // kelas yang siswanya paling banyak
            'kelas_terbesar' => Kelas::withCount('siswa')
                ->orderBy('siswa_count', 'DESC')
                ->first()
                ->nama_kelas ?? '-',

            // statistik tambahan biar card dashboard ga error
            'kehadiran' => 94,        // contoh default, nanti bisa dibikin real
            'nilai_rata2' => 82,      // bisa dibuat dinamis
            'jumlah_guru' => 48,      // nanti bisa ambil dari tabel guru kalau ada
        ];


        return view('dashboard', [
            'total_siswa'  => $total_siswa,
            'total_kelas'  => $total_kelas,
            'total_jurusan'=> $total_jurusan,
            'total_tahun'  => $total_tahun,

            'siswa_baru' => $siswa_baru,

            'aktivitas' => $aktivitas,
            'statistik' => $statistik,

            'grafik_label' => $days,
            'grafik_data'  => $counts,

            // Data baru untuk filter
            'jurusans' => Jurusan::all(),
            'kelasList' => Kelas::all(),
        ]);
    }
}
