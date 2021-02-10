<?php


namespace App\Http\Resources;

use \Illuminate\Http\Resources\Json\JsonResource;

class FAQResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [];

        if ($request['lang'] == 'ar'){
            $data = [
                'id'            => $this->id,
                'question'      => $this->ar_question,
                'slug'          => $this->slug,
                'answer'        => $this->ar_answer,
                'created_at'    => (string)$this->created_at,
                'updated_at'    => (string)$this->updated_at
            ];
        }else {
            $data = [
                'id'            => $this->id,
                'question'      => $this->en_question,
                'slug'          => $this->slug,
                'answer'        => $this->en_answer,
                'created_at'    => (string)$this->created_at,
                'updated_at'    => (string)$this->updated_at
            ];
        }

        return $data;
    }
}
