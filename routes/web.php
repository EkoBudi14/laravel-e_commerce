<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\Admin\ProductGalleryAdminController;

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


Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');


// Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'detail'])->name('categories-detail');


// Detail Product
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');


//cart product
Route::get('/cart', [CartController::class, 'index']);
Route::get('/success', [CartController::class, 'success']);


// Register
Route::get('/register/success', [RegisterController::class, 'success']);


// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// DASHBOARD-PRODUCT
Route::get('/dashboard/products', [DashboardProductController::class, 'index']);
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create']);
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'detail']);


// DASHBOARD TRANSACTION
Route::get('/dashboard/transaction', [DashboardTransactionController::class, 'index']);
Route::get('/dashboard/transaction/{id}', [DashboardTransactionController::class, 'detail']);

// DASHBOARD SETTING & ACCOUNT
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-setting-store');
Route::get('/dashboard/setting', [DashboardSettingController::class, 'setting'])->name('dashboard-setting-account');


// ADMIN
Route::prefix('admin')->group(function() {
    Route::get('/', [DashboardAdminController::class, 'index']);
    Route::resource('category', CategoryAdminController::class);
    Route::resource('user', UserAdminController::class);
    Route::resource('product', ProductAdminController::class);
    Route::resource('product-gallery', ProductGalleryAdminController::class);
});