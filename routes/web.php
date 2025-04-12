<?php

use App\Http\Controllers\UserController;
use Core\Route;

Route::get("/", fn() => view("welcome"));

Route::prefix('/users', function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
});
