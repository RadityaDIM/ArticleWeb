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

Route::get('/posts', function (Request $request) {

    return view('posts', [
        'title' => "Posts Page",
        'posts' =>
        Post::search(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString(),
        'categories' => Category::all()
    ]);
})->middleware('auth');

// Route::get('/posts', function () {
//     $user = User::with('role')->first();
//     dd($user->role); // Jika ini muncul datanya, berarti masalah ada di file Blade Anda
// });

Route::get('/posts/{post:slug}', function (Post $post) {


    // $post = Post::find($post);
    $post->load('author', 'category');

    return view('post', ['title' => 'Single Post', 'post' => $post, 'categories' => Category::all()]);
})->middleware('auth');

Route::get('/contact', function () {
    return view('contact', ['username' => '@radityadms'], ['title' => "Contact Page"]);
})->middleware('auth');

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
})->middleware('auth');

Route::get('/category/{category:slug}', function (Category $category, Request $request) {
    return view('posts', ['title' => count($category->posts) . ' Articles on Category ' . $category->name, 'posts' => $category->posts]);
})->middleware('auth');

Route::put('/profile', [UserController::class, 'update'])->name('users.update');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::delete('/post/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::put('/post/{post:slug}', [PostController::class, 'update'])->name('posts.update');

Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.sendEmail');

Route::get('/change-password', function () {
    return view('change-password', ['title' => 'Change Password']);
});
