<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

Route::view('create', 'create')->name('create');

Route::group(['middleware' => ['auth', 'verified', 'pterodactyl']], function () {

    Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');

});


require __DIR__ . '/auth.php';

