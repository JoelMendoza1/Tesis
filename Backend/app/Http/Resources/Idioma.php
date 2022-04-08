<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Idioma extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'idioma'=>$this->idioma,
            'nivel'=>$this->nivel,
            'user_id'=>$this->User::find($this->user_id),
        ];
    }
}
