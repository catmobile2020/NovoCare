<?php

namespace App;

use App\Traits\PostTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use PostTrait, SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'caption',
        'image',
        'text',
        'is_active',
    ];

    protected $perPage = 15;

    protected $hidden = [
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
