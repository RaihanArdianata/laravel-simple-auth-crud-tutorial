<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/siswa', [Controllers\Siswa\SiswaController::class, 'index'])->middleware(['auth'])->name('siswa');
Route::get('/siswa-by-id/{id}', [Controllers\Siswa\SiswaController::class, 'show'])->middleware(['auth']);
Route::post('/siswa-create', [Controllers\Auth\RegisteredUserController::class, 'store'])->middleware(['auth']);
Route::post('/siswa-update/{id}', [Controllers\Siswa\SiswaController::class, 'update'])->middleware(['auth']);
Route::get('/siswa-delete/{id}', [Controllers\Auth\RegisteredUserController::class, 'destroy'])->middleware(['auth']);

require __DIR__.'/auth.php';
