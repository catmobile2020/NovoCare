<?php


namespace App\Helper;
use Image;
use Illuminate\Support\Facades\Storage;

class StoreFile
{
    /**
     * @param $file
     * @param string $folder
     * @return string
     */
    static function save($file, $folder = 'media'){
        $data           = Image::make($file)->encode('jpg', 90);
        $data->response('jpg');
        $imageName      = $folder . '/' . time() . '.jpg';

        Storage::put($imageName, $data);

        return $imageName;
    }
}
