<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas_detail extends Model
{

    use HasFactory;

    protected $table = 'kelas_details';

    protected $fillable = [
    'siswa_id',
    'kelas_id',
    'tahun_ajar_id',
    'status',
    ];

    public function siswa()
    {

    return $this->belongsTo ( siswa::class);

    }

    public function kelas()
    {

    return $this->belongsTo ( Kelas::class);

    }

public function tahunAjar()

{

return $this->belongsTo ( tahun_ajar::class);

}
}
