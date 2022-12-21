<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Main;

Route::middleware('jwt.verify')->group(function() {
    Route::apiResource('ternak', Main\FarmDataController::class);
    Route::get('kesehatan/{id}', [Main\MedicalController::class, 'index'])->name('api.kesehatan');
});