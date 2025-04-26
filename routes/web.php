<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalonSiswaController;

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

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::fallback(function () {
    return response()->view('Errors.404', [], 404);
});

// Route::middleware('auth:api')->group(function () {
    Route::get('/', function () {
        return view('Module.Dashboard.main');
    });
// });

// Route untuk form registrasi calon siswa
Route::get('/register', function () {
    return view('Module.Registrasi.main');
})->name('calon-siswa.register.form');

// Route untuk submit form registrasi calon siswa
Route::post('/register', [CalonSiswaController::class, 'register'])->name('calon-siswa.register');


