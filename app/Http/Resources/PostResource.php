<?php


namespace App\Http\Resources;

use \Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        if (Storage::exists($this->image)){
            $this['image'] = asset(Storage::url($this->image));
        }else {
            $this['image'] = asset('media/default_image.png');
        }

        $data = [];

        if ($request['lang'] == 'ar'){
            $data = [
                'id'            => $this->id,
                'title'         => $this->ar_title,
                'slug'          => $this->slug,
                'caption'       => $this->ar_caption,
                'image'         => asset($this->image),
                'text'          => $this->ar_text,
                'created_at'    => (string)$this->created_at,
                'updated_at'    => (string)$this->updated_at
            ];
        }else {
            $data = [
                'id'            => $this->id,
                'title'         => $this->en_title,
                'slug'          => $this->slug,
                'caption'       => $this->en_caption,
                'image'         => asset($this->image),
                'text'          => $this->en_text,
                'created_at'    => (string)$this->created_at,
                'updated_at'    => (string)$this->updated_at
            ];
        }


        return $data;
    }
}
