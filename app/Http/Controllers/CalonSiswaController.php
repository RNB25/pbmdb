<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use Illuminate\Support\Facades\Hash;

class CalonSiswaController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:calon_siswas,email',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ortu' => 'required|string',
            'sekolah_asal' => 'required|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        CalonSiswa::create($validated);

        return redirect()->route('calon-siswa.register.form')->with('success', 'Pendaftaran berhasil!');
    }
}
