<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoriesController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('', [ProductsController::class, 'index'])->name('products');
    Route::get('/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::get('/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::put('/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');
    Route::delete('/destroy/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('categories')->group(function () {
    Route::get('', [ProductCategoriesController::class, 'index'])->name('categories');
    Route::get('/create', [ProductCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/store', [ProductCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [ProductCategoriesController::class, 'edit'])->name('categories.edit');
    Route::get('/{id}', [ProductCategoriesController::class, 'show'])->name('categories.show');
    Route::put('/update/{id}', [ProductCategoriesController::class, 'update'])->name('categories.update');
    Route::get('/delete/{id}', [ProductCategoriesController::class, 'delete'])->name('categories.delete');
    Route::delete('/destroy/{id}', [ProductCategoriesController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('carts', function () {
    return view('carts');
})->name('carts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
