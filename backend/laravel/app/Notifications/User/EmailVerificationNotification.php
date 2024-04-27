<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $verifyLink
    )
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Подтверждение почты')
            ->greeting('Приветствуем!')
            ->line('Пожалуйста, нажмите кнопку ниже для подтверждения почты')
            ->action('Подтвердить адрес электронной почты', $this->verifyLink);
    }


}
