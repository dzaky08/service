<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\cekrole;
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
    Route::middleware(['auth', 'cekrole:montir'])->group(function () {
        Route::get('/home-montir', [MontirController::class,'home'])->name('home-montir');
        Route::get('/detailservice/{id}', [MontirController::class,'service'])->name('detailservice');
        Route::post('/pilih/{service}', [MontirController::class,'detail'])->name('pilih');
        Route::get('/keranjang', [MontirController::class,'keranjang'])->name('keranjang');
        Route::post('/post-pesan', [MontirController::class,'postPesan'])->name('post-pesan');
        Route::get('/hapus', [MontirController::class,'hapus'])->name('hapus-keranjang');
    });
    Route::middleware(['auth', 'cekrole:kasir'])->group(function () {
        Route::get('/home-kasir', [KasirController::class,'home'])->name('home-kasir');
        Route::get('/dipesan', [KasirController::class,'dipesan'])->name('dipesan');
        Route::get('/detail-kasir/{no_kendaraan}', [KasirController::class,'detailkasir'])->name('detail-kasir');
        Route::post('/lunas/{no_kendaraan}', [KasirController::class,'lunas'])->name('lunas');
        Route::get('/summary', [KasirController::class,'summary'])->name('summary');
        Route::get('/transaksi/filter', [KasirController::class, 'filter'])->name('transaksi.filter');
        Route::get('/detailsum/{no_kendaraan}', [KasirController::class,'detailsummary'])->name('detail-summary');
        Route::get('/pdf/{no_kendaraan}', [KasirController::class,'pdf'])->name('pdf');
        Route::get('/pdf-sum', [KasirController::class,'pdfsum'])->name('pdf-sum');
    });
    
    Route::middleware(['auth', 'cekrole:admin'])->group(function () {
        Route::get('/dash-admin', [AdminController::class,'dash'])->name('dash-admin');
        Route::get('/log-admin', [AdminController::class,'log'])->name('log-admin');
        Route::get('/tambah', [AdminController::class,'tambah'])->name('tambah');
        Route::post('/post-tambah', [AdminController::class,'postTambah'])->name('post-tambah');
        Route::delete('/delete/{service}', [AdminController::class,'hapus'])->name('hapus-admin');
        Route::get('/ubah/{service}', [AdminController::class,'ubah'])->name('ubah');
        Route::post('/post-ubah/{service}', [AdminController::class,'postUbah'])->name('post-ubah');
        Route::get('/dash-user', [AdminController::class,'user'])->name('dash-user');
        Route::get('/tambah-user', [AdminController::class,'tambahuser'])->name('tambah-user');
        Route::post('/post-user', [AdminController::class,'posttambahuser'])->name('post-user');
        Route::delete('/delete-user/{user}', [AdminController::class,'hapususer'])->name('hapus-user');
        Route::get('/edit/{user}', [AdminController::class,'ubahuser'])->name('edit');
        Route::post('/post-edit/{user}', [AdminController::class,'postubahuser'])->name('edit-user');
        Route::get('/log/filter', [AdminController::class, 'filterlog'])->name('log-filter');
    });
    
    Route::middleware(['auth', 'cekrole:owner'])->group(function () {
        Route::get('/home-owner', [OwnerController::class,'home'])->name('home-owner');
        Route::get('/filterowner', [OwnerController::class,'filterowner'])->name('filterowner');
        Route::get('/logowner', [OwnerController::class,'logowner'])->name('logowner');
        Route::get('/log/filter', [OwnerController::class, 'filterlog'])->name('filter-log');
        Route::get('/sum-owner', [OwnerController::class,'summary'])->name('sum-owner');
        Route::get('/report/filter', [OwnerController::class, 'filter'])->name('report-filter');
        Route::get('/filter-sum', [OwnerController::class, 'filtersummary'])->name('filtersum');
    });
});
