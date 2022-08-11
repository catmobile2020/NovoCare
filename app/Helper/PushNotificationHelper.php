<?php


namespace App\Helper;


class PushNotificationHelper
{
    const FCM_URL = "https://fcm.googleapis.com/fcm/send";

    public static function sendTopicNotification($topic, $title, $body, $click_action = 'RESULT', $action_type = null, $action_id = null, $unreadNotificationsNumber = 1)
    {
        $message = [
            "to" => $topic,
            "data" => [
                "title" => $title,
                "body" => $body,
                "click_action" => $click_action,
                "action_type" => $action_type,
                "action_id" => $action_id,
            ],
            "notification" => [
                "title" => $title,
                "body" => $body,
                'badge' => $unreadNotificationsNumber,
                'notification_count' => $unreadNotificationsNumber,
                "topic" => $topic,
                "vibrate" => true,
                "sound" => true,
                "click_action" => $click_action,
                "action_type" => $action_type,
                "action_id" => $action_id,
            ]
        ];
        return self::sendNotification(json_encode($message));
    }

    private static function sendNotification($data)
    {
        $headers = [
            'Content-Type:application/json',
            'Authorization:key=' . config('notification.FCM_SERVER_KEY')
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::FCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
