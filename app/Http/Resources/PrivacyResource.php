<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivacyResource extends JsonResource
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
                'title' => $this->ar_title,
                'caption' => $this->ar_caption
            ];
        }else {
            $data = [
                'title' => $this->en_title,
                'caption' => $this->en_caption
            ];
        }

        return $data;
    }
}
