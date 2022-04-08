<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Empresa extends JsonResource
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
            'RUC'=>$this->RUC,
            'nombreEmpresa'=>$this->nombreEmpresa,
            'tipoEmpresa'=>$this->tipoEmpresa,
            'telefonoEmpresa'=>$this->telefonoEmpresa,
            'emailEmpresa'=>$this->emailEmpresa,
            'direccionEmpresa'=>$this->direccionEmpresa,
            'imagen'=> $this->imagen,
            'user_id'=>$this->User::find($this->user_id),
        ];
    }
}
