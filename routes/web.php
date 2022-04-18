<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPaymentController;

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
    return view('auth.login');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//payment type route
Route::get('admin/payment-type', [AdminPaymentController::class, 'payment_type'])->name('admin-payment-type')->middleware('is_admin');
Route::post('admin/payment-type/store', [AdminPaymentController::class, 'payment_type_store'])->name('payment-type-store')->middleware('is_admin');
Route::post('admin/payment-type/update', [AdminPaymentController::class, 'payment_type_update'])->name('payment-type-update')->middleware('is_admin');
Route::get('/admin/payment-type/delete/{id}', [AdminPaymentController::class, 'payment_type_delete'])->middleware('is_admin');

//payement way route
Route::get('admin/payment-way', [AdminPaymentController::class, 'payment_way'])->name('admin-payment-way')->middleware('is_admin');
Route::post('admin/payment-way/store', [AdminPaymentController::class, 'payment_way_store'])->name('payment-way-store')->middleware('is_admin');
Route::post('admin/payment-way/update', [AdminPaymentController::class, 'payment_way_update'])->name('payment-way-update')->middleware('is_admin');
Route::get('/admin/payment-way/delete/{id}', [AdminPaymentController::class, 'payment_way_delete'])->middleware('is_admin');

//
Route::get('admin/account-info', [AdminPaymentController::class, 'account_info'])->name('admin-account-info')->middleware('is_admin');
Route::post('admin/account-info/store', [AdminPaymentController::class, 'account_info_store'])->name('account-info-store')->middleware('is_admin');
Route::post('admin/account-info/update', [AdminPaymentController::class, 'account_info_update'])->name('account-info-update')->middleware('is_admin');
Route::get('/admin/account-info/delete/{id}', [AdminPaymentController::class, 'account_info_delete'])->middleware('is_admin');
