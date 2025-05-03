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
            'username'     => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
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
        $validasiUsers  = auth()->guard('api')->user()->status_users_id;
        if (isset($validasiUsers) && $validasiUsers == 2) {
            $userName = auth()->guard('api')->user()->name;

            return redirect()->route('berkasi.siswa.index')
                ->with('success', 'Berhasil login, Selamat Datang ' . $userName);
        }

        if (isset($validasiUsers) && $validasiUsers == 1) {
            $userName = auth()->guard('api')->user()->name;

            return redirect('/')->with('success', 'Berhasil login, Selamat Datang ' . $userName);
        }
    }
}
