<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\PostController as ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/posts', [ApiPostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/posts/{post:slug}', [ApiPostController::class, 'show'])->middleware('auth:sanctum');

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user-data-token', [AuthenticationController::class, 'userDataToken'])->middleware('auth:sanctum');
