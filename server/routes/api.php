<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/** Auth */
Route::put('/auth', [AuthController::class, 'register']);
Route::post('/auth', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], static function () {

    /** Service */
    Route::post('/log_out', [AuthController::class, 'logOut']);


    /** User */
    Route::get('/users/{limit?}', [UserController::class, 'index']);
    Route::get('/users/id/{id}', [UserController::class, 'show']);
    Route::post('/users/', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    /** Companies */

});

