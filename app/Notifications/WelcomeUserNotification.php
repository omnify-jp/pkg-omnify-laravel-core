<?php

namespace Omnify\Core\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $organizationName,
        private readonly string $temporaryPassword,
    ) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Welcome to {$this->organizationName}")
            ->line('Your account has been created by an administrator.')
            ->line("Your temporary password is: **{$this->temporaryPassword}**")
            ->action('Log In', url('/login'))
            ->line('Please change your password after your first login.');
    }
}
