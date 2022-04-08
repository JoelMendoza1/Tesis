<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Instruccion extends JsonResource
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
            'instruccion'=>$this->instruccion,
            'document'=>$this->document,
            'nivelInstrucion'=>$this->nivelInstrucion,
            'institucion'=>$this->institucion,
            'especializacion'=>$this->especializacion,
            'user_id'=>$this->User::find($this->user_id),
        ];
    }
}
