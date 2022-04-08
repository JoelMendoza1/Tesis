<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Habilidad extends JsonResource
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
            'descripcion'=>$this->descripcion,
            'dominio'=>$this->dominio,
            'habilidad'=>$this->habilidad,
            'user_id'=>$this->User::find($this->user_id),
        ];
    }
}
