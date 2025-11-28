<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/add-form/{id}', [ProductController::class, 'addForm'])->name('add-form');
Route::get('/add-form', [ProductController::class, 'addForm'])->name('add-form');
Route::get('/mike', function(){
  return view('components.modalTemp');
});
Route::get('/sideModal', function(){
  return view('components.sideModal');
});
Route::get('/product-form', [ProductController::class, 'productForm'])->name('product-form');
Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory');
Route::get('/transactions', [TransactionController::class, 'view'])->name('transactions');
