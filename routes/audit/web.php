<?php

use App\Http\Controllers\Page\Audit;
use Illuminate\Support\Facades\Route;

Route::resource('auth', Audit\AuthController::class);
Route::resource('model', Audit\ModelController::class);
Route::resource('system', Audit\SystemController::class);
Route::resource('query', Audit\QueryController::class);