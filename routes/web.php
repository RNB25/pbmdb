<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\PendaftaranSiswaController;
use App\Http\Controllers\PendaftaranSiswa\DashboardPendaftaranSiswaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return response()->view('Errors.404', [], 404);
});

Route::get('/', [LandingPageController::class, 'index']);
// users
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');
Route::post('/login', LoginController::class)->name('login');
Route::middleware('jwt.auth.blade')->group(function () {
    // Route::prefix('register')->group(function () {
    //     Route::get('/', [UserController::class, 'index'])->name('users.index');
    //     Route::post('/', [UserController::class, 'store'])->name('users.store');
    //     Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    //     Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    // });
    //

    // buat route baru aja san buat registrasi nya fungsi nya di faste aja nnti

    //
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::prefix('register-siswa')->group(function () {
        Route::get('/', [PendaftaranSiswaController::class, 'index'])->name('berkasi.siswa.index');
    });
});

// siswa
Route::prefix('module-pendaftaran')->group(function () {
    Route::get('/', [DashboardPendaftaranSiswaController::class,'index'])->name('siswa.index');
});
Route::prefix('pendaftaran-siswa')->group(function () {
    Route::post('/', [CalonSiswaController::class, 'store'])->name('siswa.registrasi');
    Route::post('/siswa-login', [CalonSiswaController::class, 'login'])->name('siswa.login');
});

// News routes
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Admin news routes
Route::middleware('jwt.auth.blade')->group(function () {
    Route::resource('news', NewsController::class)->except(['index', 'show']);
});

Route::get('/gallery', function () {
    return view('Module.Dashboard.gallery');
})->name('gallery.index');

