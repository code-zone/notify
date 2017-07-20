<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class SMSChannel
{

    /**
     * Send the given notification.
     *
     * @param mixed                                  $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);
        app('sms')->sms->sendMessage($notifiable->phone_number, $message);
    }
}
