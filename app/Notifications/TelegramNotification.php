<?php

namespace App\Notifications;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class TelegramNotification extends Notification
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $url = url('/');
        $url = $url . '/app/resources/exit-passes/' . $notifiable->pass_id;

        return TelegramMessage::create()
            ->to($notifiable->chat_id)
            ->content('*Hello,* ')
            ->line("A staff member has requested for an exit pass!")
            ->line("*Name:* " . $notifiable->name)
            ->line("*Reason:* " . $notifiable->pass_reason)
            ->line("*Time:* " . $notifiable->pass_time)
            ->line("*Date:* " . now()->format('Y-m-d'))
            ->button('Approve Exit Pass', $url);
    }
}
