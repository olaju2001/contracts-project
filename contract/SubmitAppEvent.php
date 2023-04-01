<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class SubmitAppEvent
{
    use SerializesModels,Dispatchable;

    public $contract;

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($contract, $user)
    {
        $this->contract = $contract;
        $this->user     = $user;
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
