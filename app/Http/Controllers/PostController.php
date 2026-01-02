<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use id;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required'
        ]);

        $validate['author_id'] = Auth::id();
        $validate['slug'] = Str::slug($request->title);

        try {

            Post::create([
                'title' => $validate['title'],
                'category_id' => $validate['category_id'],
                'body' => $validate['body'],
                'author_id' => $validate['author_id'],
                'slug' => $validate['slug'],
            ]);
            return redirect()->back()->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            // Jika gagal, tampilkan pesan error aslinya
            return dd($e->getMessage());
        }
    }
}
