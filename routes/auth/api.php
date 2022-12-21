<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth;

Route::post('login', [Auth\LoginController::class, 'index'])->name('api.login');
Route::post('register', [Auth\RegisterController::class, 'index'])->name('api.register');

Route::middleware('jwt.verify')->group(function() {
    Route::post('logout', [Auth\LogoutController::class, 'index'])->name('api.logout');
    Route::post('refresh', [Auth\RefreshController::class, 'index'])->name('api.refresh');
});