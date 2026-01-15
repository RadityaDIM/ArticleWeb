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
use Illuminate\Routing\RouteGroup;

Route::middleware('auth')->group(function () {

    Route::put('/profile', [UserController::class, 'update'])->name('users.update');
    Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.sendEmail');
    Route::put('/post/{post:slug}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/', function () {
    return view('home', ['title' => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ['title' => "About Us"]);
});

Route::get('/profile', function (User $user) {
    return view('profile', ['title' => "Your Profile", 'user' => $user]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/contact', function () {
    return view('contact', ['username' => '@radityadms'], ['title' => "Contact Page"]);
});






Route::get('/change-password', function () {
    return view('change-password', ['title' => 'Change Password']);
});
