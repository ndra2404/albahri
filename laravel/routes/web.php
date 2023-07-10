<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LoginController;
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
    return view('login');
})->name('login');
Route::get('/', function () {
    return view('home');
});
Route::get('/syarat', function () {
    return view('syarat');
});
    Route::post('doLogin', [LoginController::class, 'doLogin'])->name('doLogin');
    Route::get('logout', [LoginController::class, 'doLogout'])->name('doLogout');

    Route::resource('pendaftaran', PendaftaranController::class);
    Route::group(['middleware' => 'auth'], function(){
        Route::get('pesertadidik', [PendaftaranController::class, 'pesertaDidik'])->name('pesertadidik');
        Route::get('data/jadwal', [PendaftaranController::class, 'jadwal'])->name('data.data');
        Route::get('data/pembayaran', [PendaftaranController::class, 'pembayaran'])->name('data.pembayaran');
        Route::any('uploadDocument/{id}', [PendaftaranController::class, 'uploadDocument'])->name('uploadDocument');
        Route::get('data/pendaftaran', [PendaftaranController::class, 'pesertaDidik'])->name('data.pendaftaran');
        Route::any('verification/{id}', [PendaftaranController::class, 'verification'])->name('verification');
        Route::any('jadwalInterview/{id}', [PendaftaranController::class, 'jadwalInterview'])->name('jadwalInterview');
        Route::any('invoice/{id}', [PendaftaranController::class, 'invoice'])->name('invoice');
        Route::any('confirmation/{id}', [PendaftaranController::class, 'confirmation'])->name('confirmation');
        Route::any('pembayaran/{id}', [PendaftaranController::class, 'cekPembayaran'])->name('pembayaran');
        Route::get('cetakPdf', [PendaftaranController::class, 'cetakPdf'])->name('cetakPdf');
        Route::resource('user', UserController::class);
    });
