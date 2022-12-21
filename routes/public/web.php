<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('lang/{data}',
    [WelcomeController::class, 'update']
)->name('landing.lang');

Route::get('livestock/{data}',
    [WelcomeController::class, 'show']
)->name('landing.qrcode');

Route::get('dashboard/{data}',
    [WelcomeController::class, 'dashboard']
)->name('landing.chart');

Route::middleware('auth')->group(function() {
    Route::patch('{category}/import', [WelcomeController::class, 'import'])->name('import');
    Route::get('{category}/export', [WelcomeController::class, 'export'])->name('export');
});