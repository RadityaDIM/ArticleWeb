<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('home', ['title' => "Home Page"]);
})->middleware('auth');

Route::get('/about', function () {
    return view('about', ['nama' => "Raditya Dimas"], ['title' => "About Us"]);
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

    return view('post', ['title' => 'Single Post', 'post' => $post]);
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


Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
