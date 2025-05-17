<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_siswa_t';

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'asal_sekolah',
        'tahun_lulus',
        'status_pendaftaran',
        'is_aktif'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'is_aktif' => 'boolean'
    ];
}
