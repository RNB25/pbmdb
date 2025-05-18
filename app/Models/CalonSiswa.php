<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_siswa_t';

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'is_aktif' => 'boolean'
    ];
}
