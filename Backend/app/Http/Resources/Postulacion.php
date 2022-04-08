<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Postulacion extends JsonResource
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
            'estadoPostulacion'=>$this->estadoPostulacion,
            'descripcion'=>$this->descripcion,
            'user_id'=>$this-> User::find($this->user_id),
            'oferta_id'=>$this-> Oferta::find($this->oferta_id),
            'updated_at'=> $this-> updated_at,
            'created_at'=> $this-> created_at
        ];
    }
}
