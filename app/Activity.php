<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $guarded = [];
    public function device(){
        return $this->belongsTo(Device::class, 'device_id');
    }
}
