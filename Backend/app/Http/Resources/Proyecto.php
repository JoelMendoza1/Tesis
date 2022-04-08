<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Proyecto extends JsonResource
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
            'proyecto'=>$this->proyecto,
            'description'=>$this->description,
            'link'=>$this->link,
            'user_id'=>$this->User::find($this->user_id),
        ];
    }
}
