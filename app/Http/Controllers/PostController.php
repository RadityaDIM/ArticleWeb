<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use id;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage as FacadesStorage;

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

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validate['author_id'] = Auth::id();

        $slug = Str::slug($request->title);
        $duplicatedSlug = $slug;

        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $duplicatedSlug . '-' . $count;
            $count++;
        }

        $validate['slug'] = $slug;

        try {

            Post::create([
                'title' => $validate['title'],
                'category_id' => $validate['category_id'],
                'image' => $validate['image'] ?? null,
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

        if ($request->hasFile('image')) {
            if ($post->image) {
                FacadesStorage::delete($post->image);
            }
            $validate['image'] = $request->file('image')->store('post-images', 'public');
        } else {
            unset($validate['image']);
        }

        $validate['author_id'] = Auth::id();


        $slug = Str::slug($request->title);
        $duplicatedSlug = $slug;

        $count = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $duplicatedSlug . '-' . $count;
            $count++;
        }

        $validate['slug'] = $slug;

        // $post->update([
        //     'title' => $validate['title'],
        //     'category_id' => $validate['category_id'],
        //     'body' => $validate['body'],
        //     'author_id' => $validate['author_id'],
        //     'slug' => $validate['slug'],
        //     'image' => $validate['image'] ?? null
        // ]);
        $post->update($validate);

        return redirect('/posts/' . $post->slug)->with('success', 'Post has been updated!');
    }
}
