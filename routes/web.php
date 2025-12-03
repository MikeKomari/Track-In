<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// View Routes -> Redirect to views
Route::get('/inventory', [ProductController::class, 'getProducts'])->name('inventory');
Route::get('/inventory/form', [ProductController::class, 'getProductForm'])->name('product-form');
Route::get('/transaction/form', [TransactionController::class, 'getTransactionForm'])->name('transaction-form');
Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');
// Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');


// Action Routes -> Perform mutations (delete, update, create)
Route::post('/products', [ProductController::class, 'createProduct'])->name('create.product');
Route::delete('/products/{code}', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/register', [AuthController::class, 'register'])->name('create.user');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');