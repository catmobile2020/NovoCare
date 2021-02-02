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

        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'slug'          => $this->slug,
            'caption'       => $this->caption,
            'image'         => asset($this->image),
            'text'          => $this->text,
            'created_at'    => (string)$this->created_at,
            'updated_at'    => (string)$this->updated_at
        ];
    }
}
