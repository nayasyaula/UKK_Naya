<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.admin');
});

Route::get('/user', [UserController::class,'index'])->name('user.index');
Route::get('/user/create', [UserController::class,'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/produk/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('/prouct/update-stock/{id}', [ProductController::class, 'updateStok'])->name('product.updateStock');



