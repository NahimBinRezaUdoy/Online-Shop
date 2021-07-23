<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
});
