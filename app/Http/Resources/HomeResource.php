<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];

        if ($request['lang'] == 'ar'){
            $data = [
                'image' => asset(Storage::url($this->image)),
                'caption' => $this->ar_caption
            ];
        }else {
            $data = [
                'image' => asset(Storage::url($this->image)),
                'caption' => $this->en_caption
            ];
        }

        return $data;
    }
}
