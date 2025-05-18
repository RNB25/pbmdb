<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\PembayaranFormulir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class PendaftaranSiswaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $calonSiswa = CalonSiswa::where('users_id', $user->id)->first();
        $pembayaranFormulir = PembayaranFormulir::where('users_id', $user->id)->first();

        return view('Module.BuktiPendaftaran.main', compact('user', 'calonSiswa', 'pembayaranFormulir'));
    }

    public function update(Request $request, $idCalonSiswa)
    {
        try {
            $calonSiswa = CalonSiswa::findOrFail($idCalonSiswa);

            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'nama_panggilan' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required|string|max:50',
                'alamat' => 'required|string|max:500',
                'no_hp' => 'required|string|max:20',

                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'tempat_tanggal_lahir_ayah' => 'required|string|max:255',
                'tempat_tanggal_lahir_ibu' => 'required|string|max:255',
                'pendidikan_ayah' => 'required|string|max:255',
                'pendidikan_ibu' => 'required|string|max:255',
                'pekerjaan_ayah' => 'required|string|max:255',
                'pekerjaan_ibu' => 'required|string|max:255',
                'alamat_ortu' => 'required|string|max:500',
                'no_hp_ayah' => 'required|string|max:20',

                'ijazah' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'akta' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Assign semua data kecuali file
            $calonSiswa->fill(collect($validatedData)->except(['ijazah', 'akta', 'kk', 'foto'])->toArray());
            $calonSiswa->is_formulir = false;
            // Handle upload file
            foreach (['ijazah', 'akta', 'kk', 'foto'] as $fileField) {
                if ($request->hasFile($fileField)) {
                    // Hapus file lama jika ada
                    if ($calonSiswa->$fileField && Storage::disk('public')->exists('berkas/siswa/' . $calonSiswa->$fileField)) {
                        Storage::disk('public')->delete('berkas/siswa/' . $calonSiswa->$fileField);
                    }

                    $file = $request->file($fileField);
                    $filename = time() . '_' . uniqid() . '_' . $fileField . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('berkas/siswa', $filename, 'public');
                    $calonSiswa->$fileField = $filename;
                }
            }

            $calonSiswa->save();

            return redirect()->back()->with('success', 'Formulir berhasil dikirim,data akan kami proses, silahkan menunggu info selanjut nya.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('tab', 'formulirPendaftaran');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
