<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:50',
            'body' => 'required|min:3|max:550',
            'slug' => 'nullable|min:2|max:50',
        ]);

        $request->request->add(['author_id' => $request->user()->id]);

        $post = Post::create($request->all());
        syncTags($post);
        
        return redirect('/posts/' . $post->slug)->with('notify', 'Post created successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3|max:50',
            'body' => 'required|min:3|max:550',
            'slug' => 'min:2|max:50',
        ]);

        $post->update($request->all());
        syncTags($post);

        //redirect back with message
        return redirect('/posts/' . $post->slug)->with('notify', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('notify', 'Post deleted successfully!'); 
        return redirect('/admin/posts/');
    }

}
