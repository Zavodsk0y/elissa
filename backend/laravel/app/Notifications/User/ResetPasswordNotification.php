<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly string $url,
        public readonly string $password
    ) {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Сброс пароля')
            ->greeting("Приветствуем, $notifiable->name!")
            ->line("Ваш новый пароль $this->password")
            ->line('В случае, если вы не запрашивали данное письмо, проигнорируйте его.')
            ->action('Сменить пароль', $this->url);
    }
}
