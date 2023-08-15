<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenyewaanController;

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
});
//route user
Route::get('/rentalyuk', [UserController::class,'index'])->name('login');
Route::post('/rentalyuk/authenticate', [UserController::class,'authenticate'])->name('authenticate');
Route::get('/rentalyuk/daftar', [UserController::class,'register'])->name('daftar');
Route::post('/rentalyuk/daftar/post', [UserController::class,'postregist'])->name('postregist');
Route::get('/rentalyuk/dashboard', [UserController::class,'dashboard'])->name('dashboard');
Route::get('/rentalyuk/logout', [UserController::class,'logout']);

//route mobil
Route::get('/rentalyuk/datamobil', [MobilController::class,'index'])->name('datamobil');
Route::get('/rentalyuk/tambahmobil', [MobilController::class,'tambahmobil'])->name('tambahmobil');
Route::post('/rentalyuk/tambahmobil/post', [MobilController::class,'postmobil'])->name('postmobil');

//route penyewa

Route::get('/rentalyuk/penyewa', [PenyewaanController::class,'index'])->name('penyewaan');
Route::get('/rentalyuk/sewamobil/{id}', [PenyewaanController::class,'pengajuan'])->name('pengajuansewa');
Route::post('/rentalyuk/pengajuansewa', [PenyewaanController::class,'postpengajuan'])->name('postpengajuan');