<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest()->get();
        return view('index', compact('posts'));
    }

    public function about(Post $post)
    {
        return view('posts.about', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'slug' => 'required|unique:posts',
            'title' => 'required|max:100|min:5',
            'short_body' => 'required|max:255|min:10',
            'full_body' => 'required|min:10'
        ]);

        $post = Post::create(request()->all());
        return redirect('/');
    }

}
