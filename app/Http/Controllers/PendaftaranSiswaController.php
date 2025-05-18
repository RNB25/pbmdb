<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\PembayaranFormulir;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PendaftaranSiswaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $calonSiswa = CalonSiswa::where('users_id', $user->id)->first();
        $pembayaranFormulir = PembayaranFormulir::where('users_id', $user->id)->first();

        return view('Module.BuktiPendaftaran.main', compact('user', 'calonSiswa','pembayaranFormulir'));
    }
}
