<?php

use App\Http\Controllers\Navlink;
use App\Http\Controllers\TambahController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [Navlink::class, 'beranda']);
Route::get('/produk', [Navlink::class, 'produk'])->name('produk');
Route::get('/tambah', [Navlink::class, 'tambah']);
Route::get('/produk/{id}', [TambahController::class, 'edit'])->name('produk.edit');

Route::get('/produk', [TambahController::class, 'index'])->name('produk.index');
Route::post('/produk', [TambahController::class, 'store'])->name('produk.tambah');
Route::put('/produk/{id}', [TambahController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [TambahController::class, 'destroy'])->name('produk.delete');