<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LoginController;
use App\Mail\TeamInvitation;
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
        Route::post('join-card/{card_id}', [CardController::class, 'joinCard'])->name('card.join-card');
        Route::post('add-tag/{card_id}', [CardController::class, 'addTag'])->name('card.add-tag');
        Route::post('store/{column_id}', [CardController::class, 'store'])->name('card.store');
        Route::get('detail/{card_id}', [CardController::class, 'detail'])->name('card.detail');
        Route::post('sort/{column_id}', [CardController::class, 'sort'])->name('card.sort');
        Route::post('update/{card_id}', [CardController::class, 'update'])->name('card.update');
    });

    Route::group(['prefix' => 'checklist'], function () {
        Route::post('store/{card_id}', [ChecklistController::class, 'store'])->name('checklist.store');
        Route::post('update/{checklist_id}', [ChecklistController::class, 'update'])->name('checklist.update');
        Route::post('destroy/{checklist_id}', [ChecklistController::class, 'destroy'])->name('checklist.destroy');
    });

    Route::group(['prefix' => 'checklist-item'], function () {
        Route::post('store/{checklist_id}', [ChecklistItemController::class, 'store'])->name('checklist-item.store');
        Route::post('update/{checklist_item_id}', [ChecklistItemController::class, 'update'])->name('checklist-item.store');
        Route::post('destroy/{checklist_item_id}', [ChecklistItemController::class, 'destroy'])->name('checklist-item.destroy');
    });

    Route::group(['prefix' => 'config'], function () {
        Route::group(['prefix' => 'my-data'], function () {
            Route::get('', [ConfigController::class, 'index'])->name('config.index');
            Route::post('save', [ConfigController::class, 'save'])->name('config.my-data-save');
        });

        Route::group(['prefix' => 'team'], function () {
            Route::get('', [ConfigController::class, 'team'])->name('config.team');
            Route::get('manager/{id?}', [ConfigController::class, 'teamManager'])->name('config.team-manager');
            Route::post('store/{id?}', [ConfigController::class, 'teamStore'])->name('config.team-store');
            Route::post('invitation/{id}', [ConfigController::class, 'teamInvitation'])->name('config.team-invitation');
            Route::get('accept-invitation/{id}', [ConfigController::class, 'acceptInvitation'])->name('config.accept-invitation');
        });
    });

    Route::group(['prefix' => 'mail-template'], function () {
        Route::get('team-invitation', function () {
            return new TeamInvitation('jhonnyf@live.com', 1);
        });
    });

});
