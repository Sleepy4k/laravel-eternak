<?php

use App\Http\Controllers\Page\Admin;
use Illuminate\Support\Facades\Route;

Route::resource('account', Admin\AccountController::class, ['names' => 'akun']);
Route::resource('role', Admin\RoleController::class);