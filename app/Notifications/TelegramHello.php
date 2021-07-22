<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;
use Illuminate\Notifications\Notification;

class TelegramHello extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toTelegram($notifiable)
    {
        return TelegramFile::create()
            ->to($notifiable)
            ->content("Приятного Вам дня\n")
            ->photo('foto/yandere801234animal.jpg');
    }
}