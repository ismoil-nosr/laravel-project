<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Post::latest()->published()->limit(3)->get();
        return view('home', compact('posts'));
    }
}
