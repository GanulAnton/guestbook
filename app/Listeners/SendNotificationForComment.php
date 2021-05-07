<?php

namespace App\Listeners;

use App\Events\CreateNewComment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class SendNotificationForComment
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
     * @param  CreateNewComment  $event
     * @return void
     */
    public function handle(CreateNewComment $event)
    {
      $commentInfo = $event->comment;

      return $commentInfo['text'];

    }
}
