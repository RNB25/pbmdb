<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class VerifyJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = session('jwt_token');

            if (!$token) {
                return redirect('/login')->withErrors(['login' => 'Akses ditolak, token tidak ada.']);
            }

            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                return redirect('/login')->withErrors(['login' => 'Token tidak valid.']);
            }

            // Set user ke auth()->user()
            auth()->setUser($user);
        } catch (Exception $e) {
            return redirect('/login')->withErrors(['login' => 'Token tidak valid atau expired.']);
        }

        return $next($request);
    }
}
