<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmitAppNotification extends Notification
{
    use Queueable;

    private $contract;

    private $url;

    /**
     * Create a new notification instance.
     * @param $contract
     * @param $url
     */
    public function __construct($contract,$url)
    {
        $this->contract = $contract;
        $this->url = $url;
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
                    ->line( __('api.new_contract_from').' ' . auth()->user()->first_name .' ' . __('api.had_been_submitted'))
                    ->line( __('api.follow_this_link_to_preview_the_contract'))
                    ->action( __('api.click_here'),$this->url)
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
