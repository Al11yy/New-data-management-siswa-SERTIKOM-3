<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\tahun_ajar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
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


        // --- 2. ACTIVITIES REAL (update/add siswa terbaru) ---
        $aktivitas = Siswa::orderBy('updated_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($s) {
                return [
                    'aksi' => "Update data siswa: " . $s->nama_lengkap,
                    'waktu' => $s->updated_at->diffForHumans()
                ];
            });


        // --- 3. STATISTIK SEKOLAH – REAL + FIX ---
        $statistik = [
            'rata_siswa_per_kelas' => $total_kelas ? round($total_siswa / $total_kelas, 1) : 0,

            // jurusan terpopuler berdasarkan jumlah siswa
            'jurusan_terpopuler' =>
                Jurusan::withCount('siswa')
                    ->orderBy('siswas_count', 'DESC')
                    ->first()
                    ->nama_jurusan ?? '-',

            // kelas yang siswanya paling banyak
            'kelas_terbesar' =>
                Kelas::withCount('siswa')
                    ->orderBy('siswas_count', 'DESC')
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

            'siswa_baru' => Siswa::with(['kelas', 'jurusan'])
                ->latest()
                ->take(5)
                ->get(),

            'aktivitas' => $aktivitas,
            'statistik' => $statistik,

            'grafik_label' => $days,
            'grafik_data'  => $counts,
        ]);
    }
}

