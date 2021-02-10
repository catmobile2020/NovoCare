<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table = 'terms';
    protected $fillable = [
        'en_title',
        'en_caption',
        'ar_title',
        'ar_caption',
    ];
}
