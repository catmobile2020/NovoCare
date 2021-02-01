<?php


namespace App\Traits;

use Carbon\Carbon;

trait PostTrait
{

    /**
     * @param $date
     * @return string
     */
    protected function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('l, j F Y');
    }

    /**
     * @param $date
     * @return string
     */
    protected function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->diffForHumans();
    }
}
