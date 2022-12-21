<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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

// App Set Default Locale
App::setLocale(config('app.locale', 'en'));

// Init Route
Route::middleware('Language')->group(function() {
    // Default Web Route
    Route::get('',
        [WelcomeController::class, 'index']
    )->name('landing');
    
    // Authenticate Web Route
    require __DIR__.'/auth/web.php';
    
    // Default Page
    Route::prefix('page')->group(function() {
        // Public Route
        Route::prefix('public')->group(function() {
            require __DIR__.'/public/web.php';
        });

        Route::middleware('auth')->group(function() {
            // Dashboard Web Route
            Route::prefix('main')->group(function() {
                require __DIR__.'/main/web.php';
            });

            // Setting Web Route
            Route::prefix('setting')->group(function() {
                require __DIR__.'/setting/web.php';
            });
            
            // Admin Web Route
            Route::prefix('admin')->group(function() {
                require __DIR__.'/admin/web.php';
            });

            // System Web Route
            Route::prefix('system')->group(function() {
                require __DIR__.'/system/web.php';
            });

            // Audit Web Route
            Route::prefix('audit')->group(function() {
                require __DIR__.'/audit/web.php';
            });
        });
    });
});