<?php

namespace App;

use App\Traits\ConfigurationTrait;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use ConfigurationTrait;

    protected $table = 'configurations';
    protected $fillable = [
        'value'
    ];
}
