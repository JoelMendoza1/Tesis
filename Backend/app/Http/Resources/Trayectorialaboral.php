<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Trayectorialaboral extends JsonResource
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
            'empresa'=>$this->empresa,
            'puestoTrabajo'=>$this->puestoTrabajo,
            'responsabilidades'=>$this->responsabilidades,
            'fechaInicio'=>$this->fechaInicio,
            'fechaSalida'=>$this->fechaSalida,
            'contacto'=>$this->contacto,
            'user_id'=>$this->User::find($this->user_id),
        ];
    }
}
