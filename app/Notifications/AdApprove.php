<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Ad;

class AdApprove extends Notification
{
    use Queueable;

    /**
     * The ad.
     *
     * @var \App\Models\Ad
     */
    protected $ad;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Ad  $ad
     * @return void
     */
    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Nous avons approuvé une annonce que vous avez déposée :')
                    ->action('Voir votre annonce', route('annonces.show', $this->ad->id))
                    ->line("Merci d'utiliser notre site pour vos annonces !");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
