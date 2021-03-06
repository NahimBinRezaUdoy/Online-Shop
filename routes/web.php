<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login/store', [AdminController::class, 'loginStore'])->name('admin.login.store');

Route::group(['middleware' => 'admin_auth'], function () {
    //admin dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //admin category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('admin/category/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('admin/category/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    Route::get('admin/category/status/{status}/{category}', [CategoryController::class, 'status']);

    //admin coupon
    Route::get('admin/coupon', [CouponController::class, 'index'])->name('admin.coupon.index');
    Route::get('admin/coupon/create', [CouponController::class, 'create'])->name('admin.coupon.create');
    Route::post('admin/coupon/store', [CouponController::class, 'store'])->name('admin.coupon.store');
    Route::get('admin/coupon/edit/{coupon}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
    Route::put('admin/coupon/update/{coupon}', [CouponController::class, 'update'])->name('admin.coupon.update');
    Route::delete('admin/coupon/delete/{coupon}', [CouponController::class, 'destroy'])->name('admin.coupon.delete');

    Route::get('admin/coupon/status/{status}/{coupon}', [CouponController::class, 'status']);

    //admin Size
    Route::get('admin/size', [SizeController::class, 'index'])->name('admin.size.index');
    Route::get('admin/size/create', [SizeController::class, 'create'])->name('admin.size.create');
    Route::post('admin/size/store', [SizeController::class, 'store'])->name('admin.size.store');
    Route::get('admin/size/edit/{size}', [SizeController::class, 'edit'])->name('admin.size.edit');
    Route::put('admin/size/update/{size}', [SizeController::class, 'update'])->name('admin.size.update');
    Route::delete('admin/size/delete/{size}', [SizeController::class, 'destroy'])->name('admin.size.delete');

    Route::get('admin/size/status/{status}/{size}', [SizeController::class, 'status']);

    //admin Color
    Route::get('admin/color', [ColorController::class, 'index'])->name('admin.color.index');
    Route::get('admin/color/create', [ColorController::class, 'create'])->name('admin.color.create');
    Route::post('admin/color/store', [ColorController::class, 'store'])->name('admin.color.store');
    Route::get('admin/color/edit/{color}', [ColorController::class, 'edit'])->name('admin.color.edit');
    Route::put('admin/color/update/{color}', [ColorController::class, 'update'])->name('admin.color.update');
    Route::delete('admin/color/delete/{color}', [ColorController::class, 'destroy'])->name('admin.color.delete');

    Route::get('admin/color/status/{status}/{color}', [ColorController::class, 'status']);

    //admin Product
    Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('admin/product/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('admin/product/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('admin/product/delete/{product}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    Route::get('admin/product/status/{status}/{product}', [ProductController::class, 'status']);
});
