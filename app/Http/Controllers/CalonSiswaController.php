<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\Gelombang;
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
            'nama_lengkap'  => 'required|string',
            'nama_panggilan'  => 'required|string',
            'tempat_lahir'  => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama'  => 'required|string',
            'email'         => 'required|email|unique:calon_siswa_t,email',
            'jenis_kelamin' => 'required|exists:jenis_kelamin_m,id',
            'alamat'  => 'required|string',
            'jalur_masuk'   => 'required|string',
            'nisn'          => 'required|string|unique:calon_siswa_t,nisn',
            'no_hp'         => 'required|regex:/^[0-9]+$/',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('tab', 'registrasi');
        }

        $validated = $validator->validated();
        $today = now()->toDateString();

        $gelombangAktif = Gelombang::where('is_aktif', true)
            ->whereDate('tanggal_mulai', '<=', $today)
            ->whereDate('tanggal_berakhir', '>=', $today)
            ->orderBy('tanggal_mulai', 'asc')
            ->first();


        if (!$gelombangAktif) {
            return redirect()
                ->route('siswa.index')
                ->with('gagal_creat', 'Pendaftaran gagal, karna saat ini gelombang pendaftaran belum dibuka.');
        }

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
            'jumlah_harga'   => $gelombangAktif['biaya'],
            'is_lunas'       => false,
            'status'         => 'Unpaid',
            'is_aktif'       => true,
            'kode_eksternal'  => 'PEMBAYARAN_FORMULIR',
            'created_by'     => auth()->id() ?? 2,
            'updated_by'     => auth()->id() ?? 2,
        ]);

        $calon_siswa = CalonSiswa::create([
            'is_aktif'           => false,
            'kode_eksternal'     => 'KGJ',
            'users_id'           => $user->id,
            'pembayaran_formulir_id' => $pembayaran->id,
            'nama_lengkap'       => $validated['nama_lengkap'],
            'nama_panggilan'     => $validated['nama_panggilan'],
            'tempat_lahir'       => $validated['tempat_lahir'],
            'jenis_kelamin_id'   => $validated['jenis_kelamin'],
            'tanggal_lahir'      => $validated['tanggal_lahir'],
            'agama'              => $validated['agama'],
            'email'              => $validated['email'],
            'alamat'             => $validated['alamat'],
            'jalur_masuk'        => $validated['jalur_masuk'],
            'nisn'               => $validated['nisn'],
            'no_hp'              => $validated['no_hp'],
            'kode_ekternal'      => 'DAFTAR_ONLINE',
            'created_by'         => auth()->id() ?? 2,
            'updated_by'         => auth()->id() ?? 2,
        ]);

        $this->mitrans($pembayaran, $calon_siswa);

        return redirect()
            ->route('siswa.index')
            ->with('success_pendaftaran', 'Pendaftaran berhasil, Menunggu Verifikasi');
    }

    public function mitrans($pembayaran, $calon_siswa)
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

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hasbed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hasbed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $payment = PembayaranFormulir::find($request->order_id);
                $payment->update([
                    'status' => 'Paid',
                    'is_lunas' => true,
                    'tanggal_bayar' => $request->expiry_time,
                    'metode_pembayaran' => $request->payment_type
                ]);
            }
        }
    }
}
