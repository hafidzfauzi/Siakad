<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaApiController;

Route::middleware('api.key')
    ->name('api.')
    ->group(function () {
        Route::apiResource('mahasiswa', MahasiswaApiController::class);
});
