<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MontirController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;

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
Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('/post-login', [AuthController::class,'postLogin'])->name('post-login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    Route::prefix('montir')->group(function () {
        Route::get('/home-montir', [MontirController::class,'home'])->name('home-montir');
        Route::post('/detail/{service}', [MontirController::class,'detail'])->name('detail');
        Route::get('/keranjang', [MontirController::class,'keranjang'])->name('keranjang');
        Route::post('/post-pesan', [MontirController::class,'postPesan'])->name('post-pesan');
        Route::get('/hapus', [MontirController::class,'hapus'])->name('hapus');
    });
    Route::prefix('kasir')->group(function () {
        Route::get('/home-kasir', [KasirController::class,'home'])->name('home-kasir');
        Route::get('/detail-kasir/{no_kendaraan}', [KasirController::class,'detailkasir'])->name('detail-kasir');
        Route::post('/lunas/{no_kendaraan}', [KasirController::class,'lunas'])->name('lunas');
        Route::get('/summary', [KasirController::class,'summary'])->name('summary');
        Route::get('/detailsum/{no_kendaraan}', [KasirController::class,'detailsummary'])->name('detail-summary');
    });
});
