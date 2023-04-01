<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class AcceptAppEvent
{
    use SerializesModels,Dispatchable;

    public $contract;

    public $user;

    public $admins;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($contract, $user, $admins )
    {
        $this->contract = $contract;
        $this->user     = $user;
        $this->admins   = $admins;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
