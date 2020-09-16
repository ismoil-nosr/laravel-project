<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest()->get();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.about', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:posts',
            'title' => 'required|max:100|min:5',
            'short_body' => 'required|max:255|min:10',
            'full_body' => 'required|min:10'
        ]);

        Post::create($request->all());
        return redirect('/posts/' . $request->input('slug'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'slug' => 'required|unique:posts',
            'title' => 'required|max:100|min:5',
            'short_body' => 'required|max:255|min:10',
            'full_body' => 'required|min:10'
        ]);

        $post->update($attributes);
        return redirect('/posts/' . $request->input('slug'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

}
