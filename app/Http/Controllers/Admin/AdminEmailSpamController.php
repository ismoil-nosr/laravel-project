<?php

namespace App\Http\Controllers\Admin;

use App\EmailSpam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SpamNewsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminEmailSpamController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $spams = EmailSpam::latest()->get();
        return view('admin.spam.index', compact('spams'));
    }

    public function create()
    {
        return view('admin.spam.create');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailSpam  $spam
     * @return \Illuminate\Http\Response
     */
    public function show(EmailSpam $spam)
    {
        return view('admin.spam.show', compact('spam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => 'required|min:3|max:50',
            'body' => 'required|min:3',
            'recepients_type' => 'required|in:all,subscribers,users,custom',
            'recepients_custom' => 'required'
        ]);

        $spam = EmailSpam::create($attr);
        $this->send($spam, $attr);

        return redirect('/admin/email-spam/' . $spam->id . '')->with('notify', 'Spam created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailSpam  $spam
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailSpam $spam)
    {
        $spam->delete();
        Session::flash('notify', 'Spam letter deleted successfully!'); 
        return redirect('/admin/email-spams/');
    }

    /**
     * send emails to queue
     *
     * @param EmailSpam $spam
     * @param [type] $attr
     * @return void
     */
    public function send(EmailSpam $spam, $attr)
    {
        switch ($attr['recepients_type']) {
            case 'all':
                $users = \App\User::get(['email'])->pluck('email')->toArray();
                $subscribers = \App\EmailSubscribers::get(['email'])->pluck('email')->toArray();
                $mail_list = array_merge($users, $subscribers);
                break;

            case 'subscribers':
                $mail_list = \App\EmailSubscribers::get(['email'])->pluck('email');
                break;

            case 'users':
                $mail_list = \App\User::get(['email'])->pluck('email');
                break;
                
            case 'custom':
                $array = explode(',', $attr['recepients_custom']);
                $mail_list = array_map('trim', $array);
                break;
        }

        foreach($mail_list as $email) {
            Mail::to($email)->queue(new \App\Mail\SpamSend($spam));
        }

        return;
    }
}