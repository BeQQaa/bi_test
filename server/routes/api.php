<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/** Auth */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], static function () {
    /** Is auth */

    Route::post('/log_out', [AuthController::class, 'logOut']);



});

