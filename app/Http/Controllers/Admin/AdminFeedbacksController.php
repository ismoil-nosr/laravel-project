<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Feedback;

class AdminFeedbacksController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect('/admin/feedbacks/')->with('notify', 'Feedback deleted successfully!');
    }
}