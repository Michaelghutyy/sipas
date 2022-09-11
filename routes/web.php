<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\ChangePasswordController;
use App\Models\SuratMasuk;

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

// Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('ChangePassword', ChangePasswordController::class);

Route::resource('disposisi', DisposisiController::class);
Route::resource('surat-masuk', SuratMasukController::class);
Route::get('laporan-suratmasuk', SuratMasukController::class . '@laporan')->name('surat-masuk.laporan');    // laporan surat masuk

Route::resource('surat-keluar', SuratKeluarController::class);
Route::get('laporan-suratkeluar', SuratKeluarController::class . '@laporan')->name('surat-keluar.laporan');    // laporan surat keluar