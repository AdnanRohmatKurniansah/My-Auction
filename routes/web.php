<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->prefix('auth')->group(function() {
    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'store']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:masyarakat,petugas');

Route::middleware(['auth:petugas'])->prefix('dashboard')->group(function() {
    Route::get('/', function() {
        return view('dashboard.index');
    });
    Route::resource('/barang', BarangController::class);
    Route::get('/lelang', [LelangController::class, 'index']);
    Route::middleware(['petugas'])->group(function() {
        Route::get('/lelang/create', [LelangController::class, 'create']);
        Route::post('/lelang', [LelangController::class, 'store']);
        Route::put('/lelang/{lelang}', [LelangController::class, 'close']);
        Route::delete('/lelang/{lelang}', [LelangController::class, 'destroy']);
        Route::get('/lelang/{lelang}', [LelangController::class, 'show']);
    });
});