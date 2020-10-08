<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Feedback;
use Illuminate\Support\Facades\Session;

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
        Session::flash('notify', 'Feedback deleted successfully!'); 
        return redirect('/admin/feedbacks/');
    }
}