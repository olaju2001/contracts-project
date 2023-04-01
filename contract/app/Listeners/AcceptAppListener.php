<?php

namespace App\Listeners;
use App\Events\AcceptAppEvent;
use App\Notifications\AcceptAppNotification;
use App\Notifications\UserAcceptAppNotification;

class AcceptAppListener
{
    /**
     * Handle the event.
     *
     * @param AcceptAppEvent $event
     * @return void
     */
    public function handle(AcceptAppEvent $event)
    {
        if($event->contract->status == 'A')
        {
            foreach($event->admins as $admin){
                $admin->notify(new AcceptAppNotification($event->user));
            }
            $event->user->notify(new UserAcceptAppNotification);
        }
    }
}
