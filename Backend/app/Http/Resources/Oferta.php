<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Oferta extends JsonResource
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
            'oferta'=>$this->oferta,
            'fechaOferta'=>$this->fechaOferta,
            'descripcionOferta'=>$this->descripcionOferta,
            'horario'=>$this->horario,
            'numberoPostulantes'=>$this->numberoPostulantes,
            'direcionOferta'=>$this->direcionOferta,
            'carreraOferta'=>$this->carreraOferta,
            'visible'=>$this->visible,
            'empresa_id'=>$this-> Empresa::find($this->empresa_id),
            'updated_at'=> $this-> updated_at,
            'created_at'=> $this-> created_at
        ];
    }
}
