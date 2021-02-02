<?php

namespace App;

use App\Traits\ContactTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use ContactTrait, SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'comment'
    ];

    protected $perPage = 15;
}
