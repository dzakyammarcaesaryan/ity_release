<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminBukuController;


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/datapenjualan', function () {
    return view('admin.datapenjualan');
});

Route::get('/data-buku', [HomeController::class, 'dataBuku'])->name(name: 'data.buku');
Route::get('/checkout/{id}', [HomeController::class, 'checkout'])->name(name: 'checkout');
Route::post('/process-checkout', [HomeController::class, 'precessCheckout'])->name(name: 'checkout.process');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboardadmin');
    });
    Route::resource('buku', AdminBukuController::class);

});

// routes/api.php


    // Route::get('/','DashboardController@index');