<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Tag;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function store(Request $request)
    {
        $attr = $request->validate([
            'name'    => 'required|min:3|max:50',
            'email'   => 'required|email',
            'message' => 'required|min:5|max:500',
        ]);

        Feedback::create($attr);
        return redirect('/contact')->with('notify', 'Message sent successfully!');
    }
}
