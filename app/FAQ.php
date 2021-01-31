<?php

namespace App;

use App\Traits\FAQTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use FAQTrait,SoftDeletes;

    protected $table = 'f_a_q_s';
    protected $fillable = [
        'question',
        'slug',
        'answer',
        'is_active',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
