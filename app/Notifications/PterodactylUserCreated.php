<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class PterodactylUserCreated extends Notification
{

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'https://panel.reflexhosting.co.uk';
        return (new MailMessage)
            ->subject(Lang::get('Panel Details'))
            ->line(Lang::get('Hey {user},'))
            ->line(Lang::get('Thanks for signing up on Reflex Hosting! here are your panel details '))
            ->action(Lang::get('Go To Panel '), $url)
            ->line(Lang::get('Username: ' . $notifiable->username))
            ->line(Lang::get(' password: ' . $this->password));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
