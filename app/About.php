<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    protected $fillable = [
        'en_title',
        'en_caption',
        'ar_title',
        'ar_caption',
    ];
}
