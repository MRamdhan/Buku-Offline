<?php

use App\Http\Controllers\KasirController;
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

Route::get('/', [KasirController::class, 'login'])->name('login');
Route::get('/detail/{buku}', [KasirController::class, 'detail'])->name('detail.buku');
Route::post('postlogin', [KasirController::class, 'postlogin'])->name('postlogin');
Route::get('/home', [KasirController::class, 'home'])->name('home');

Route::middleware('auth')->group(function(){
    Route::post('detailtransaksi/view-pdf', [KasirController::class, 'viewPDF'])->name('view-pdf');
    Route::post('detailtransaksi/download-pdf', [KasirController::class, 'downloadPDF'])->name('download-pdf');
    Route::get('logout', [KasirController::class, 'logout'])->name('logout');
    Route::post('/postkeranjang/{buku}', [KasirController::class, 'postkeranjang'])->name('postkeranjang.buku');
    Route::get('/keranjang', [KasirController::class, 'keranjang'])->name('keranjang.buku');
    Route::get('/bayar{detailtransaksi}', [KasirController::class, 'bayar'])->name('bayar.buku');
    Route::post('/prosesbayar/{detailtransaksi}', [KasirController::class, 'prosesbayar'])->name('prosesbayar.buku');
    Route::get('/summary', [KasirController::class, 'summary'])->name('summary.buku');
    
    Route::get('/tambah', [KasirController::class, 'tambah']);
    Route::post('/tambahbuku', [KasirController::class, 'tambahbuku'])->name('tambahbuku');
});
