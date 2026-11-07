<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/produtos/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/produtos/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/produtos/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/produtos/store', [ProductController::class, 'store'])->name('products.store');
    Route::put('/produtos/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categorias/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categorias/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/categorias/{id}/produtos', [ProductController::class, 'indexByCategory'])->name('categories.products');
    Route::post('/categorias/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categorias/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categorias/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/vendas', [SaleController::class, 'index'])->name('sales.index');
    Route::post('/vendas/store/{p_id}', [SaleController::class, 'store'])->name('sales.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
