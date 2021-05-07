<?php

namespace App\Providers;

use App\Events\CreateNewComment;
use App\Events\CreateNewReply;
use App\Listeners\SendNotificationForComment;
use App\Listeners\SendNotificationForReply;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{


    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreateNewComment::class => [
            SendNotificationForComment::class,
        ],
        CreateNewReply::class => [
            SendNotificationForReply::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
