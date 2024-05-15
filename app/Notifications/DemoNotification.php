<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class DemoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','vonage'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Hello from Harry')
                    ->line('Hello!')
                    ->line('Thank you for watching my talk at LeedsPHP')
                    ->line('I work for WEALTH at Work. We\'re pretty cool. ')
                    ->line('We help companies provide financial education and well-being to their staff')
                    ->action('Find out more','https://www.wealthatwork.co.uk/corporate/our-services/financial-education/');
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
            ->content('Hello! Thanks for watching my lightning talk at LeedsPHP. I work for WEALTH at Work. We\'re pretty cool. We help companies provide financial education and well-being to their staff. Check us out: https://www.wealthatwork.co.uk/corporate/our-services/financial-education/');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
