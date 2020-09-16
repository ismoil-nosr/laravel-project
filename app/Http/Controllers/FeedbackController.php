<?php

namespace App\Http\Controllers;

use App\Feedback;
class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedbacks', compact('feedbacks'));
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'message' => 'required|min:2|max:500',
        ]);

        Feedback::create(request()->all());
        return redirect()->back()->with('success', true);
    }
}
