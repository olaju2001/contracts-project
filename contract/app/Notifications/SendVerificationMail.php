<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class SendVerificationMail extends Notification
{
    use Queueable;

    private $code;
    private $email;

    /**
     * Create a new notification instance.
     * @param $code
     */
    public function __construct($code, $email)
    {
        $this->code = $code;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting(" ")
                    ->line(__('api.Please_use_the_following_code_to_verify_your_mail'))
                    ->line(new HtmlString('<a href="' . url('/api/auth/verify') . '/?pin_code=' . $this->code . '&email=' . $this->email . '">click here to verify your email</a>'))
                    ->line( __('api.Thank_for_using_our_application!'));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
