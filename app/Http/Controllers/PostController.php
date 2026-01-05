<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use id;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->author_id) {
            abort(403, 'Authentication error, please retry log in');
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post has been deleted!');
    }


    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->author_id) {
            abort(403, 'Authentication error, please retry log in');
        }

        // dd($request->all());
        $validate = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required'
        ]);

        $validate['author_id'] = Auth::id();
        $validate['slug'] = Str::slug($request->title);


        $post->update([
            'title' => $validate['title'],
            'category_id' => $validate['category_id'],
            'body' => $validate['body'],
            'author_id' => $validate['author_id'],
            'slug' => $validate['slug'],
        ]);

        return redirect('/posts/' . $post->slug)->with('success', 'Post has been updated!');
    }
}
