<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\SendVerificationMail;
use App\Models\Verification;

class SendVerificationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userId = $this->user->id;
        $user   = $this->createCode($userId);
        $code   = $user->pin_code;

        $this->user->notify(new SendVerificationMail($code, $this->user->email));
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function createCode($userId)
    {
        // generating a random code with length of 64 characters
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 64; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return Verification::create([
            'user_id'  => $userId,
            'pin_code' => $code,
        ]);
    }
}
