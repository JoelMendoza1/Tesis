<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'lastname'=> $this->lastname,
            'email' => $this->email,
            'identificationCard'=> $this->identificationCard,
            'telephoneNumber'=>$this->telephoneNumber,
            'address'=>$this->address,
            'dateOfBirth'=>$this->dateOfBirth,
            'career'=>$this->career,
            'institution'=>$this->institution,
            'semester'=>$this->semester,
            'totalSemestrerCarrer'=>$this->totalSemestrerCarrer,
            'request'=>$this->request,
            'descriptionRequest'=>$this->descriptionRequest,
            'document'=>$this->document,
            'image'=>$this->image,
            'typeUser'=>$this->typeUser,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
