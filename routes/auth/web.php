<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\Auth;

Route::middleware('guest')->group(function() {
    Route::resource('login', Auth\LoginController::class);
    Route::resource('register', Auth\RegisterController::class);
});

Route::middleware('auth')->group(function() {
    Route::resource('logout', Auth\LogoutController::class);
});