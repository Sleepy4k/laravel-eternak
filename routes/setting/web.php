<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\Setting;

Route::resource('account', Setting\AccountController::class);
Route::resource('profile', Setting\ProfileController::class);
Route::resource('farm', Setting\CompanyController::class);