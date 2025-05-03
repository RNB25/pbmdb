<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\PembayaranFormulir;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Midtrans\Snap;
use Midtrans\Config;

class CalonSiswaController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'      => 'required|string|max:255',
            'password'      => 'required|string|min:6',
            'jalur_masuk'   => 'required|string',
            'nisn'          => 'required|string',
            'nama_lengkap'  => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_hp'         => 'required|regex:/^[0-9]+$/',
            'email'         => 'required|email|unique:calon_siswa_t,email',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $user = User::create([
            'name'      => $validated['nama_lengkap'],
            'email'      => $validated['email'],
            'username'      => $validated['username'],
            'password'      => Hash::make($validated['password']),
            'status_users_id' => 2,
            'is_aktif' => false,
            'kode_eksternal' => 'SISWA',
        ]);

        $pembayaran = PembayaranFormulir::create([
            'users_id'       => $user->id,
            'jumlah_harga'   => 20000,
            'is_lunas'       => false,
            'status'         => 'Unpaid',
            'is_aktif'       => true,
            'kode_ekternal'  => 'PEMBAYARAN_FORMULIR',
            'created_by'     => auth()->id() ?? 2,
            'updated_by'     => auth()->id() ?? 2,
        ]);

        $calon_siswa = CalonSiswa::create([
            'users_id'       => $user->id,
            'pembayaran_formulir_id'       => $pembayaran->id,
            'is_pembayaran_formulir'       => false,
            'jalur_masuk'   => $validated['jalur_masuk'],
            'nisn'          => $validated['nisn'],
            'nama_lengkap'  => $validated['nama_lengkap'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'no_hp'         => $validated['no_hp'],
            'email'         => $validated['email'],
            'is_aktif'      => false,
            'kode_ekternal' => 'DAFTAR_ONLINE',
            'created_by'    => auth()->id() ?? 2,
            'updated_by'    => auth()->id() ?? 2,
        ]);

        $this->mitrans($pembayaran,$calon_siswa);

        return redirect()
            ->route('siswa.index')
            ->with('success_pendaftaran', 'Pendaftaran berhasil, Menunggu Verifikasi');
    }

    public function mitrans($pembayaran,$calon_siswa)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pembayaran->id,
                'gross_amount' => $pembayaran->jumlah_harga,
            ],
            'customer_details' => [
                'first_name' => $calon_siswa->nama_lengkap,
                'email' => $calon_siswa->email,
                'phone' => $calon_siswa->no_hp,
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            // Simpan token ke database jika perlu
            $pembayaran->update(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
        }
    }
}
