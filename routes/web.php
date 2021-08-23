<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Models\Supplier;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Supplier
Route::middleware(['auth'])->group(function () {
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::post('/supplier', [SupplierController::class, 'store']);
    Route::get('/createSupplier', [SupplierController::class, 'create']);
    Route::get('/supplier/{id}', [SupplierController::class, 'show']);
    Route::get('/editSupplier/{id}', [SupplierController::class, 'edit']);
    Route::put('/supplier/{id}', [SupplierController::class, 'update']);
    Route::delete('supplier/{id}', [SupplierController::class, 'destroy']);
});

// Customer
Route::middleware(['auth'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::post('/customer', [CustomerController::class, 'store']);
    Route::get('/createcustomer', [CustomerController::class, 'create']);
    Route::get('/customer/{id}', [CustomerController::class, 'show']);
    Route::get('/editcustomer/{id}', [CustomerController::class, 'edit']);
    Route::put('/customer/{id}', [CustomerController::class, 'update']);
    Route::delete('customer/{id}', [CustomerController::class, 'destroy']);
});


