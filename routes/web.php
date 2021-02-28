<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ColumnController;
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

    Route::group(['prefix' => 'columns'], function () {
        Route::post('store/{board_id}', [ColumnController::class, 'store'])->name('column.store');
        Route::post('sort/{board_id}', [ColumnController::class, 'sort'])->name('column.sort');
        Route::post('update/{column_id}', [ColumnController::class, 'update'])->name('column.update');
        Route::post('destroy/{column_id}', [ColumnController::class, 'destroy'])->name('column.destroy');
    });

    Route::group(['prefix' => 'cards'], function () {
        Route::post('store/{column_id}', [CardController::class, 'store'])->name('card.store');
        Route::post('sort/{column_id}', [CardController::class, 'sort'])->name('card.sort');
        Route::get('detail/{card_id}', [CardController::class, 'detail'])->name('card.detail');
    });

});
