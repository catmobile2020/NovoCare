<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $table = 'privacies';
    protected $fillable = [
        'title',
        'caption',
    ];
}
