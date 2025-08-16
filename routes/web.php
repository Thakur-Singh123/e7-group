<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return redirect()->to('admin/dashboard');
});

Auth::routes();


//admin
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/import-forecast', [App\Http\Controllers\Admin\ForecastController::class, 'index']);
    Route::post('/import-forecast', [App\Http\Controllers\Admin\ImportController::class, 'import'])->name('import.forecast');
    Route::get('/forecast/all-records', [App\Http\Controllers\Admin\ForecastController::class, 'view_all_records']);
    Route::get('/forecast/search-records', [App\Http\Controllers\Admin\ForecastController::class, 'search_forecast']);
});
