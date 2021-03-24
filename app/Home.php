<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'homes';
    protected $fillable = [
        'image',
        'en_caption',
        'ar_caption'
    ];
}
