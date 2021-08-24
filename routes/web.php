<?php

use App\Models\Supplier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelHargaController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\KategoriBarangController;

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
    Route::get('/createCustomer', [CustomerController::class, 'create']);
    Route::get('/customer/{id}', [CustomerController::class, 'show']);
    Route::get('/editCustomer/{id}', [CustomerController::class, 'edit']);
    Route::put('/customer/{id}', [CustomerController::class, 'update']);
    Route::delete('customer/{id}', [CustomerController::class, 'destroy']);
});

// Kategori Barang
Route::middleware(['auth'])->group(function () {
    Route::get('/kategoriBarang', [KategoriBarangController::class, 'index']);
    Route::post('/kategoriBarang', [KategoriBarangController::class, 'store']);
    Route::get('/createKategoriBarang', [KategoriBarangController::class, 'create']);
    Route::get('/kategoriBarang/{id}', [KategoriBarangController::class, 'show']);
    Route::get('/editKategoriBarang/{id}', [KategoriBarangController::class, 'edit']);
    Route::put('/kategoriBarang/{id}', [KategoriBarangController::class, 'update']);
    Route::delete('kategoriBarang/{id}', [KategoriBarangController::class, 'destroy']);
});

// Kategori Barang
Route::middleware(['auth'])->group(function () {
    Route::get('/satuanBarang', [SatuanBarangController::class, 'index']);
    Route::post('/satuanBarang', [SatuanBarangController::class, 'store']);
    Route::get('/createSatuanBarang', [SatuanBarangController::class, 'create']);
    Route::get('/satuanBarang/{id}', [SatuanBarangController::class, 'show']);
    Route::get('/editSatuanBarang/{id}', [SatuanBarangController::class, 'edit']);
    Route::put('/satuanBarang/{id}', [SatuanBarangController::class, 'update']);
    Route::delete('satuanBarang/{id}', [SatuanBarangController::class, 'destroy']);
});

// Level Harga
Route::middleware(['auth'])->group(function () {
    Route::get('/levelHarga', [LevelHargaController::class, 'index']);
    Route::post('/levelHarga', [LevelHargaController::class, 'store']);
    Route::get('/createLevelHarga', [LevelHargaController::class, 'create']);
    Route::get('/levelHarga/{id}', [LevelHargaController::class, 'show']);
    Route::get('/editLevelHarga/{id}', [LevelHargaController::class, 'edit']);
    Route::put('/levelHarga/{id}', [LevelHargaController::class, 'update']);
    Route::delete('levelHarga/{id}', [LevelHargaController::class, 'destroy']);
});
