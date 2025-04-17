<?php

use App\Exports\SaleExport;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/produk/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::patch('/produk/{id}/stok', [ProductController::class, 'updateStok'])->name('produk.updateStok');

    Route::get('/sale', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sale/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sale/store', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/sale/produk', [SaleController::class, 'sales'])->name('sales.produk');
    Route::post('/sale/process-product', [SaleController::class, 'processProduct'])->name('sales.process.product');
    Route::post('/sale/process-member', [SaleController::class, 'processMember'])->name('sales.process.member');
    Route::post('/sale/member', [SaleController::class, 'member'])->name('sales.member');
    Route::get('invoice/{id}/download', [SaleController::class, 'downloadInvoice'])->name('sale.pdf');

    Route::get('/export-sale', function () {
        return Excel::download(new SaleExport, 'sale.xlsx');
    });
    Route::get('/chart-data', [SaleController::class, 'chartData']);

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

require __DIR__ . '/auth.php';
