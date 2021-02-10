<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $table = 'privacies';
    protected $fillable = [
        'en_title',
        'en_caption',
        'ar_title',
        'ar_caption',
    ];
}
