<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-form', [ProductController::class, 'addForm'])->name('add-form');
Route::get('/mike', function(){
  return view('components.modal-temp');
});
Route::get('/sideModal', function(){
  return view('components.transaction-modal');
});
Route::get('/alamak', function(){
  return view('components.inventory-modal');
});
Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory');
Route::get('/transactions', [TransactionController::class, 'view'])->name('transactions');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
});
