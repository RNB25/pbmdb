<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors([
                'login' => json_encode([
                    'success' => false,
                    'message' => 'Input dan password, harus di isi !!'
                ])
            ])->withInput();
        }

        $credentials = $request->only('username', 'password');

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return redirect()->back()->withErrors([
                'login' => json_encode([
                    'success' => false,
                    'message' => 'Username atau Password Anda salah'
                ])
            ])->withInput();
        }

        session(['jwt_token' => $token]);

        $user = auth()->guard('api')->user();

        if (isset($user->status_users_id) && $user->status_users_id == 2) {
            if (!$user->is_aktif) {
                return redirect()->back()->withErrors([
                    'login' => json_encode([
                        'success' => false,
                        'message' => 'Akun Anda belum diverifikasi oleh admin.'
                    ])
                ])->withInput();
            }

            return redirect()->route('berkasi.siswa.index')
                ->with('success', 'Berhasil login, Selamat Datang ' . $user->name);
        }

        if (isset($user->status_users_id) && $user->status_users_id == 1) {
            return redirect('/')->with('success', 'Berhasil login, Selamat Datang ' . $user->name);
        }
    }
}
