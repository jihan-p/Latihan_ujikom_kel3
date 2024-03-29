<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
//LOAD CONTROLLER
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\Buku\DataBukuController;
use App\Http\Controllers\Buku\KategoriBukuController;
use App\Http\Controllers\Buku\KategoriBukuRelasiController;
use App\Http\Controllers\Buku\KoleksiPribadiController;
use App\Http\Controllers\Buku\PeminjamanController;
use App\Http\Controllers\Buku\UlasanBukuController;
use App\Http\Controllers\DataUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ROUTE LOGIN
Route::get('',[AuthController::class, 'index'])->name('login');
Route::post('/auth',[AuthController::class, 'auth'])->name('auth');

// ROUTE SETELAH LOGIN
Route::prefix('dashboard')->group(function(){
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('data_buku',DataBukuController::class);
    Route::resource('peminjaman',PeminjamanController::class);
    Route::resource('data_user',DataUserController::class);
    Route::resource('ulasan_buku',UlasanBukuController::class);
    Route::resource('kategori_buku',KategoriBukuController::class);
    Route::resource('koleksi_pribadi',KoleksiPribadiController::class);
    Route::post('koleksi_pribadi/{id}',[KoleksiPribadiController::class,'store'])->name('kolekasi_pribadi_simpan');
    ROute::resource('kategori_buku_relasi',KategoriBukuRelasiController::class);
});



