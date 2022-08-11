<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotifications extends Model
{
    use HasFactory;
    protected $table = 'push_notifications';
    protected $guarded = [];
    public static function getTopics()
    {
        return $data = [
            "0"=>"web",
            "1"=>"android",
            "2"=>"apple"
        ];
    }
}
