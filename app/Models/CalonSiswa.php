<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'no_hp',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ortu',
        'sekolah_asal',
    ];
}
