<?php

namespace App\Helper;

use App\Events\Notifications;
use App\Notifications\UserNotification;

class SendNotificationHelper
{
    public static function notify($users, $message, $name, $click_action, $action_type, $action_id){
        foreach ($users as $user){
            $topic = $user->device_token;
            $user->notify(new UserNotification(
                auth()->user()->name,
                $user->name,
                $name,
                $message,
                $action_type,
                $action_id
            ));
            $unreadNotificationsNumber = $user->unreadNotifications->count();
            event(new Notifications());
            PushNotificationHelper::sendTopicNotification($topic, $name, $message, $click_action, $action_type, $action_id, $unreadNotificationsNumber);
        }
    }
}
