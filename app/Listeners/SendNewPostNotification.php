<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Services\Pushall;

class SendNewPostNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        return app(Pushall::class)->send($event->post);
    }
}
