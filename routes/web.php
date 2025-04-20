<?php

use Illuminate\Support\Facades\Route;

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


