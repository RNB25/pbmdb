<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranFormulir extends Model
{
    use HasFactory;


    protected $table = 'pembayaran_formulir_m';

    protected $guarded = [
        'id'
    ];
}
