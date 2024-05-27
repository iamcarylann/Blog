<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{

    public function create()
    {
        return Inertia::render('Create');
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return Inertia::render('Edit', ['posts' => $posts]);
    }

    public function show()
    {
        $user_id = auth()->user()->id ?? null;
    
        $posts = Post::where('user_id', $user_id)
                    ->orderBy('id')
                    ->get();
    
        return Inertia::render('Posts', ['posts' => $posts]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($id);
        $user = auth()->user();

        if ($post->user_id === $user->id) {
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
            ]);
        }

        return redirect()->route('post')->with('success', 'Post updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string|max:1000',
        ]);

        $user = auth()->user(); 

        if ($user) {
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('post')->with('success', 'Post added successfully.');
    }


    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post')->with('success', 'Post deleted successfully.');
    }
}

