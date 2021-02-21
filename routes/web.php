<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('', function () {
    return redirect()->route('board.index');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login.index');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'boards'], function () {
        Route::get('', [BoardController::class, 'index'])->name('board.index');
    });
});
