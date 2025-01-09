<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\ItemController as AdminItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::prefix('items')->name('items.')->controller(ItemController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/checkout/{item}', 'checkout')->name('checkout');
    Route::post('/payment/{item}/buy', 'buy')->name('buy');
    Route::get('/payment/{item}/{transaction}/invoice', 'invoice')->name('invoice');
    Route::get('/payment', 'payment')->name('payment');
    Route::post('/payment/payout', 'payout')->name('payout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('items')->name('items.')->controller(AdminItem::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/','store')->name('store');
        Route::get('/{item}','show')->name('show');
        Route::get('/{item}/edit','edit')->name('edit');
        Route::put('/{item}','update')->name('update');
        Route::delete('/{item}','destroy')->name('destroy');
    });
});
