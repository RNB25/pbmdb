<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\UserController;

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

// User Management Routes
Route::prefix('register')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


