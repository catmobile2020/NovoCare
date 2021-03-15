<?php

namespace App;

use App\Traits\SurveyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use SoftDeletes, SurveyTrait;

    protected $table = 'surveys';

    protected $fillable = [
        'en_survey',
        'ar_survey',
        'status',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
