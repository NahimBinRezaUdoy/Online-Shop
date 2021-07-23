<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
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
});
