<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
        Route::get('detail/{id}', [BoardController::class, 'detail'])->name('board.detail');
        Route::get('create', [BoardController::class, 'create'])->name('board.create');
        Route::post('store', [BoardController::class, 'store'])->name('board.store');
    });

});
