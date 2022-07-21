<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PharmacyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return redirect(route('admin.login.index'));
});

Route::get('/admin',[LoginController::class,'login'])->name('admin.login.index');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('/login', [LoginController::class, 'authentication'])->name('admin.login.store');

Route::view('dashboard', 'Admin/Dashboard/index')->name('admin.dashboard');

//------------ USER ROUTES START -------------------------//
Route::group(['prefix' => 'admin/user'],function(){
    Route::get('/index',[UserController::class,'index'])->name('admin.user.index');
});
//------------ USER ROUTES END -------------------------//

//------------ PHARMACY ROUTES START -------------------------//
Route::group(['prefix' => 'admin/pharmacy'], function () {
    Route::get('/index', [PharmacyController::class, 'index'])->name('admin.pharmacy.index');
});
//------------ PHARMACY ROUTES END -------------------------//

//------------ ORDER ROUTES START -------------------------//
Route::group(['prefix' => 'admin/order'], function () {
    Route::get('index', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('order-details/{id}', [OrderController::class, 'details'])->name('admin.order.details');
});
//------------ ORDER ROUTES START -------------------------//

//------------ REPORT ROUTES START -------------------------//
Route::group(['prefix' => 'admin/report'], function () {
    Route::get('index', [ReportController::class, 'index'])->name('admin.report.index');
});
//------------ REPORT ROUTES START -------------------------//

//------------ PROFILE ROUTES START -------------------------//
Route::group(['prefix' => 'admin/profile'], function () {
    Route::get('index', [LoginController::class, 'profile'])->name('admin.profile.index');
    Route::get('update', [LoginController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::get('changePass', [LoginController::class, 'changePass'])->name('admin.profile.password');
});
//------------ PROFILE ROUTES END -------------------------//
