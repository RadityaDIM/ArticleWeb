<?php

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Faker\Provider\Lorem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Faker\Provider\HtmlLorem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('home', ['title' => "Home Page"]);
})->middleware('auth');

Route::get('/about', function () {
    return view('about', ['title' => "About Us"]);
})->middleware('auth');

Route::get('/profile', function (User $user) {
    return view('profile', ['title' => "Your Profile", 'user' => $user]);
})->middleware('auth');

Route::get('/posts', [PostController::class, 'index'])->middleware('auth');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact', ['username' => '@radityadms'], ['title' => "Contact Page"]);
})->middleware('auth');

Route::put('/profile', [UserController::class, 'update'])->name('users.update');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::delete('/post/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::put('/post/{post:slug}', [PostController::class, 'update'])->name('posts.update');

Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.sendEmail');

Route::get('/change-password', function () {
    return view('change-password', ['title' => 'Change Password']);
});
