<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\System;

Route::prefix('sidebar')->group(function() {
    Route::resource('menu', System\MenuController::class);
    Route::resource('page', System\PageController::class);
    Route::resource('category', System\CategoryController::class);
});

Route::resource('translate', System\TranslateController::class);
Route::resource('personalization', System\ApplicationController::class, ['names' => 'application']);