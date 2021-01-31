<?php


namespace App\Traits;


use Carbon\Carbon;

trait FAQTrait
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
