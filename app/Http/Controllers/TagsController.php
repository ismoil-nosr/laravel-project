<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->published()->get();
        return view('posts.index', compact('posts'));
    }
}
