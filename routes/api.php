<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\PostController as ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user-data-token', [AuthenticationController::class, 'userDataToken']);
});

Route::get('/posts', [ApiPostController::class, 'index']);
Route::get('/posts/{post:slug}', [ApiPostController::class, 'show']);

Route::post('/login', [AuthenticationController::class, 'login']);
