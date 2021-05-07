<?php

namespace App\Listeners;

use App\Events\CreateNewReply;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationForReply
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
     * @param  CreateNewReply  $event
     * @return void
     */
    public function handle(CreateNewReply $event)
    {
        {
            $replyInfo = $event->reply;

            return $replyInfo['text'];
        }
    }
}
