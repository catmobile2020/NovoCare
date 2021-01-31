<?php


namespace App\Traits;


use App\Category;
use Carbon\Carbon;

trait PostTrait
{

    /**
     * @param $date
     * @return string
     */
    protected function getCreatedAtAttribute($date){
        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * @param $date
     * @return string
     */
    protected function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->diffForHumans();

    }
}
