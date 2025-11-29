<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::post('/add-product', [ProductController::class, 'storeProduct'])->name('store-product');
Route::get('/mike', function(){
  return view('components.modalTemp');
});
Route::get('/sideModal', function(){
  return view('components.transactionModal');
});
Route::get('/alamak', function(){
  return view('components.inventoryModal');
});
Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory');
Route::get('/transactions', [TransactionController::class, 'view'])->name('transactions');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
});
