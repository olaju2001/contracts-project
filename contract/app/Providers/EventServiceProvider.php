<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SubmitAppListener;
use App\Events\SubmitAppEvent;
use App\Listeners\AcceptAppListener;
use App\Events\AcceptAppEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class     => [SendEmailVerificationNotification::class],
        SubmitAppEvent::class => [SubmitAppListener::class],
        AcceptAppEvent::class => [AcceptAppListener::class]
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
