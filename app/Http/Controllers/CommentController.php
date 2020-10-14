<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|min:2'
        ]);

        $request->request->add(['author_id' => $request->user()->id]);

        $post->comments()->create($request->all());
        return redirect('/posts/' . $post->slug)->with('notify', 'Comment added succesfully!');
    }
}
