<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ListProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listproduk', [ListProdukController::class, 'show']);
Route::post('/listproduk', [ListProdukController::class, 'simpan'])
->name('produk.simpan');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])
->name('produk.delete');
Route::PATCH('/listproduk/{id}', [ListProdukController::class, 'update'])
->name('produk.update');

