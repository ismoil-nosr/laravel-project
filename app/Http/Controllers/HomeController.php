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
        $posts = \App\Post::getLatestPublished()->take(3);
        return view('home', compact('posts'));
    }
}
