<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlansController;


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

Route::view('/', 'index')->name('index');

Route::view('products', 'products')->name('products');

Route::view('payment-successful', 'payments.successful')->name('payment.successful');

Route::group(['middleware' => ['auth', 'verified', 'pterodactyl']], function () {

    Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');

    Route::get('create', [PlansController::class, 'index'])->name('create');

    Route::get('create/{plan}', [PlansController::class, 'show'])->name('plan.show');
    Route::post('create/{plan}', [PlansController::class, 'create'])->name('plan.create');

    Route::get('checkout', [PlansController::class, 'checkout'])->middleware('payment')->name('plan.checkout');

    Route::get('account/update-payment-method', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('account/update-payment-method', [PaymentController::class, 'update'])->name('payment.update');

});


require __DIR__ . '/auth.php';

