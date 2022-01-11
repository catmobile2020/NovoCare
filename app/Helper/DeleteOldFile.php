<?php


namespace App\Helper;
use Illuminate\Support\Facades\Storage;

class DeleteOldFile
{
    static function delete($path){
        $exists = Storage::exists($path);
        if ($exists){
            Storage::delete($path);
        }
        return;
    }
}
