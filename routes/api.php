<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Grupo de rutas protegidas por JWT
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);

    // La ruta de usuarios requiere el rol de admin
    Route::middleware('admin')->get('/users', [UserController::class, 'index']);
});