<?php

namespace App\Mail;

use App\EmailSpam;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpamSend extends Mailable
{
    use Queueable, SerializesModels;
    public $spam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailSpam $spam)
    {
        $this->spam = $spam;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.spam.send');
    }
}