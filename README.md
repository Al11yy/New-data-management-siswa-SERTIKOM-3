<p align="center">
  <img src="public/images/Logojir.png" alt="EduData Logo" width="120" />
</p>

# EduData – Sistem Manajemen Siswa SMK Pesat

EduData adalah aplikasi internal berbasis Laravel yang membantu tim administrasi sekolah mengelola data akademik secara terpusat. Proyek ini memadukan dashboard interaktif, automasi laporan statistik, serta modul CRUD lengkap untuk setiap entitas penting di lingkungan SMK Pesat.

## Gambaran Singkat

- **Target pengguna:** staf tata usaha, guru wali, dan admin sekolah.
- **Tujuan utama:** menyederhanakan pengelolaan siswa, kelas, jurusan, tahun ajar, serta aktivitas kenaikan kelas.
- **Nilai jual:** satu dashboard terpadu dengan visualisasi tren 7 hari, log aktivitas lintas entitas, dan akses cepat ke aksi penting.

## Fitur Utama

1. **Dashboard Interaktif**
   - Statistik jumlah siswa, kelas, jurusan, dan tahun ajar secara real-time.
   - Grafik penambahan siswa 7 hari terakhir plus filter dinamis (jurusan, kelas, gender).
   - Log aktivitas terbaru yang menggabungkan perubahan pada siswa, kelas, jurusan, dan tahun ajar.
   - Kartu aksi cepat (Tambah Siswa/Kelas/Jurusan/Tahun Ajar) serta daftar siswa terbaru.

2. **Manajemen Data Siswa**
   - CRUD lengkap dengan relasi ke jurusan, kelas, dan tahun ajar.
   - Halaman detail menampilkan profil, riwayat kenaikan kelas, dan modal ganti kelas.
   - Dukungan attachment histori kelas melalui tabel `kelas_details`.

3. **Manajemen Kelas & Jurusan**
   - Pengaturan level kelas, jurusan terkait, dan validasi otomatis (mis. level 1–12).
   - Jurusan dapat melihat mahasiswa terdaftar melalui relasi Eloquent.

4. **Tahun Ajar**
   - CRUD untuk kode/nama tahun ajar, termasuk keterkaitan ke siswa dan riwayat kelas.

5. **Manajemen User**
   - Daftar user dengan avatar, unggah foto profil ke storage publik, serta form update data dasar.
   - Middleware `is_admin` siap digunakan untuk membatasi akses hanya bagi akun admin.

6. **Profil Pengguna & Autentikasi**
   - Halaman profile bawaan Laravel Breeze untuk update data diri dan penghapusan akun.
   - Tampilan login guest bertema gelap dengan dukungan Alpine dan Tailwind.

7. **UI/UX Modern**
   - Layout glassmorphism adaptif (mobile + desktop sidebar).
   - Komponen Alpine.js untuk dropdown, modal filter, dan menu aksi.
   - Chart.js untuk visualisasi data.

## Teknologi & Arsitektur

- **Framework:** Laravel 12 (Breeze + Vite).
- **Front-end:** Tailwind CSS, Alpine.js, Chart.js.
- **Database:** MySQL/MariaDB (melalui Eloquent ORM).
- **Storage:** Public disk untuk foto pengguna.
- **Auth:** Laravel Breeze dengan middleware `auth` + alias `is_admin`.

## Cara Menjalankan

```bash
# 1. Install dependensi PHP & JS
composer install
npm install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Migrasi & seeding data awal
php artisan migrate --seed

# 4. Jalankan server & asset bundler
php artisan serve
npm run dev
```

Default akun hasil seeder:

- Admin — `admin@gmail.com` / `password`
- Guru  — `guru@gmail.com` / `password`

## Struktur Modul

| Modul                 | File Utama                                                                 | Catatan                                                                 |
|-----------------------|-----------------------------------------------------------------------------|-------------------------------------------------------------------------|
| Dashboard             | `app/Http/Controllers/DashboardController.php`, `resources/views/dashboard` | Statistik, grafik Chart.js, filter Alpine.js                           |
| Siswa                 | `SiswaController`, `resources/views/siswa/*`                                | CRUD, detail siswa, riwayat kelas, modal ganti kelas                   |
| Kelas & Jurusan       | `KelasController`, `JurusanController`, view terkait                        | Validasi level, relasi jurusan                                         |
| Tahun Ajar            | `TahunAjarController`, view terkait                                        | Pengelolaan periode akademik                                           |
| Kelas Detail          | `KelasDetailController`, `resources/views/kelas_detail/*`                   | Riwayat perpindahan kelas, status aktif/nonaktif                       |
| User Management       | `UserManagementController`, `resources/views/user_management/*`            | List avatar, edit profil dengan upload foto                             |
| Profile & Auth        | `ProfileController`, `resources/views/profile/*`, `resources/views/auth/*`  | Halaman profil, form login/forgot-password bertema gelap               |

## Catatan Presentasi

- Tekankan bahwa dashboard menyajikan insight real-time (grafik + log aktivitas) sehingga manajemen cepat mengambil keputusan.
- Tunjukkan riwayat kenaikan kelas sebagai diferensiasi: setiap perpindahan otomatis terekam pada `kelas_details`.
- Sebutkan UI bertema glassmorphism + mobile-first, memudahkan demo ke stakeholder non-teknis.
- Jelaskan roadmap keamanan: middleware `is_admin`, validasi filter dashboard, dan kontrol akses lanjutan.

---

Lisensi mengikuti Laravel (MIT). Untuk pertanyaan lebih lanjut, silakan hubungi tim pengembang internal SMK Pesat.
