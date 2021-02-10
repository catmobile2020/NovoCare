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
        'en_title',
        'ar_title',
        'slug',
        'caption',
        'en_caption',
        'ar_caption',
        'image',
        'text',
        'en_text',
        'ar_text',
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
