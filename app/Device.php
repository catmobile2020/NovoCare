<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $guarded = [];
    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
