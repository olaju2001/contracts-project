<?php

namespace App\Listeners;
use App\Events\SubmitAppEvent;
use App\Notifications\SubmitAppNotification;
use App\Notifications\UserSubmitAppNotification;

class SubmitAppListener
{
    /**
     * Handle the event.
     *
     * @param SubmitAppEvent $event
     * @return void
     */
    public function handle(SubmitAppEvent  $event )
    {
        $url = config('app.front_url').'#/contracts/'.$event->contract->id;

       foreach($event->user as $user) {
        $user->notify(new SubmitAppNotification($event->contract,$url));
       }
       auth()->user()->notify(new UserSubmitAppNotification($event->contract,$url));
    }
}
