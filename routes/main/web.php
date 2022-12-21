<?php

use App\Http\Controllers\Page\Main;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function() {
    Route::resource('report', Main\ReportController::class);
    Route::resource('statistic', Main\DashboardController::class);
});

Route::resource('livestock', Main\FarmController::class);
Route::resource('medical', Main\MedicalController::class);