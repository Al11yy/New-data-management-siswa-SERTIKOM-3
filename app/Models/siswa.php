<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'jurusan_id',
        'kelas_id',
        'tahun_ajar_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function tahunAjar()
    {
        return $this->belongsTo(tahun_ajar::class, 'tahun_ajar_id');
    }

    // relasi ke tabel kelas_details (riwayat kelas)
    public function kelasDetails()
    {
        return $this->hasMany(kelas_detail::class, 'siswa_id');
    }
}
