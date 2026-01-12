<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'image' => 'nullable|image|file|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $validate['image'] = $request->file('image')->store('user-images', 'public');
        }

        $user->update($validate);

        return back()->with('success', 'Post has been updated!');
    }
}
