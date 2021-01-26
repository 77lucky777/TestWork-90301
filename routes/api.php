<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('book/{id}', [BookController::class, 'get']);
    Route::get('book', [BookController::class, 'list']);
    Route::post('book', [BookController::class, 'create']);
    Route::put('book', [BookController::class, 'update']);
    Route::delete('book/{id}', [BookController::class, 'delete']);
    
    Route::get('user', [UserController::class, 'get']);
    Route::post('logout', [AuthController::class, 'logout']);
});
