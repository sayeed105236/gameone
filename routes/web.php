<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminShowPaymentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AffilateController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPaymentController;

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


Route::get('/home', [App\Http\Controllers\FrontendController::class, 'index'])->name('home')->middleware('auth');

//User package
Route::get('/home/buy_package/{id}', [FrontendController::class, 'buy_package'])->middleware('auth');
Route::post('/home/buy_package/store', [FrontendController::class, 'store_package'])->name('buy-package')->middleware('auth');
//user transaction report
Route::get('/home/transactions/{id}', [FrontendController::class, 'manage_transaction'])->middleware('auth');
//user profile
Route::get('/home/user-profile/{id}', [ProfileController::class, 'profile'])->middleware('auth');
Route::post('/home/update-profile/store', [ProfileController::class, 'UpdateProfile'])->name('update-profile')->middleware('auth');
Route::post('/home/user-password/change-password-store',[ProfileController::class,'changePassStore'])->name('change-password-store')->middleware('auth');
Route::get('/home/my_asset/{id}', [FrontendController::class, 'my_asset'])->middleware('auth');
//Usr payment method
Route::get('/home/user-payment-method/{id}', [UserPaymentController::class, 'index'])->middleware('auth');
Route::post('/home/user-payment-method/store', [UserPaymentController::class, 'store'])->name('user-payment-method')->middleware('auth');
Route::post('/home/user-payment-method/update', [UserPaymentController::class, 'update'])->name('user-payment-method-update')->middleware('auth');

// User Withdraw
Route::get('/home/withdraw/{id}', [AddMoneyController::class, 'withdraw_manage'])->middleware('auth');
Route::post('/home/withdraw/store', [AddMoneyController::class, 'withdraw_store'])->name('withdraw-store')->middleware('auth');

//user fund transfer
Route::get('/home/fund-transfer/{id}', [FrontendController::class, 'fund_transfer'])->middleware('auth');
Route::post('/home/fund-transfer/store', [FrontendController::class, 'fund_transfer_store'])->name('fund-transfer')->middleware('auth');

//user buy/sell token
Route::post('/home/buy_token/store', [FrontendController::class, 'store_buy_token'])->name('buy-token')->middleware('auth');
Route::post('/home/sell_token/store', [FrontendController::class, 'store_sell_token'])->name('sell-token')->middleware('auth');
//user payment
Route::get('/home/add-fund/{id}', [App\Http\Controllers\AddMoneyController::class, 'index'])->name('add-money')->middleware('auth');
Route::get('/home/approve_fund/{amount}/{description}', [App\Http\Controllers\AddMoneyController::class, 'approveFund'])->middleware('auth');

Route::post('/user/add-fund/store', [AddMoneyController::class,'Store'])->name('money-store')->middleware('auth');
Route::post('/user/add-fund/manually/store', [AddMoneyController::class,'StoreManual'])->name('money-store-manual')->middleware('auth');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::post('/home/get-sponsor', [RegisterController::class,'getSponsor'])->name('get-sponsor');
Route::post('/home/get-user', [HomeController::class,'getUser'])->name('get-users');

//user affilate
Route::get('/home/my-affilate/{id}', [AffilateController::class, 'index'])->name('affilates')->middleware('auth');
Route::get('/home/add-affilate/{id}', [AffilateController::class, 'add_affilate'])->middleware('auth');
Route::post('/home/add-affilate/store', [AffilateController::class, 'userAdd'])->name('affilate-add')->middleware('auth');


//general settings
Route::get('admin/general-settings', [SettingsController::class, 'index'])->name('general-settings')->middleware('is_admin');
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

//acccount info
Route::get('admin/account-info', [AdminPaymentController::class, 'account_info'])->name('admin-account-info')->middleware('is_admin');
Route::post('admin/account-info/store', [AdminPaymentController::class, 'account_info_store'])->name('account-info-store')->middleware('is_admin');
Route::post('admin/account-info/update', [AdminPaymentController::class, 'account_info_update'])->name('account-info-update')->middleware('is_admin');
Route::get('/admin/account-info/delete/{id}', [AdminPaymentController::class, 'account_info_delete'])->middleware('is_admin');

//admin show payment reqs
Route::get('/admin/add-money/requests', [AdminShowPaymentController::class,'Manage'])->name('deposit-manage')->middleware('is_admin');
Route::get('/admin/add-money-approve/{id}', [AdminShowPaymentController::class,'approve'])->middleware('is_admin');
Route::get('/admin/add-money-reject/{id}/{user_id}/{amount}', [AdminShowPaymentController::class,'rejected'])->middleware('is_admin');
//admin withdraw Request
Route::get('/admin/withdraw/requests', [AdminShowPaymentController::class,'ManageWithdraw'])->name('withdraw-manage')->middleware('is_admin');
Route::get('/admin/withdraw-approve/{id}', [AdminShowPaymentController::class,'withdrawapprove'])->middleware('is_admin');
Route::get('/admin/withdraw-reject/{id}/{user_id}/{amount}', [AdminShowPaymentController::class,'withdrawrejected'])->middleware('is_admin');
// Settings Update
Route::post('admin/token-rate/update', [SettingsController::class, 'token_rate_update'])->name('token-rate-update')->middleware('is_admin');
Route::post('admin/ambassador/update', [SettingsController::class, 'ambassador_update'])->name('ambassador-update')->middleware('is_admin');
Route::post('admin/transfer-info/update', [SettingsController::class, 'transfer_info_update'])->name('transfer-info-update')->middleware('is_admin');
Route::post('admin/withdraw-info/update', [SettingsController::class, 'withdraw_info_update'])->name('withdraw-info-update')->middleware('is_admin');
Route::post('admin/company-info/update', [SettingsController::class, 'company_update'])->name('company-update')->middleware('is_admin');
Route::post('admin/token_settings/update', [SettingsController::class, 'token_update'])->name('tokens-update')->middleware('is_admin');
//all users
Route::get('admin/user-lists', [HomeController::class, 'user_lists'])->name('admin-user-lists')->middleware('is_admin');

//admin add money to user
Route::post('admin/add-money/store', [AddMoneyController::class, 'AdminAddMoney'])->name('admin-add-money')->middleware('is_admin');
Route::post('admin/add-money/token/store', [AddMoneyController::class, 'AdminAddMoneyToken'])->name('admin-add-money-token')->middleware('is_admin');
Route::post('admin/add-money/bonus/store', [AddMoneyController::class, 'AdminAddMoneyBonus'])->name('admin-add-money-bonus')->middleware('is_admin');

//admin package settings

Route::get('admin/packages', [PackageController::class, 'index'])->name('admin-packages')->middleware('is_admin');
Route::post('admin/packages/store', [PackageController::class, 'store'])->name('store-package')->middleware('is_admin');
Route::post('admin/packages/update', [PackageController::class, 'update'])->name('update-package')->middleware('is_admin');
Route::get('/admin/packages/delete/{id}', [PackageController::class, 'delete'])->middleware('is_admin');
