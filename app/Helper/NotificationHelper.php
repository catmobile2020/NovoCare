<?php


namespace App\Helper;


class NotificationHelper
{
    public static function notification($message, $type)
    {
        if (gettype($message) == 'array'){
            $msg = '';
            foreach ($message as $messageArray)
                foreach ($messageArray as $theMessage)
                    $msg .= $theMessage .'<br>';
            return ['message' => $msg, 'alert-type' => $type];
        }
        return [
            'message'    => $message,
            'alert-type' => $type
        ];
    }
}
