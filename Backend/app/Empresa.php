<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Empresa extends Model
{
    protected $fillable =[
        'RUC',
        'nombreEmpresa',
        'tipoEmpresa',
        'telefonoEmpresa',
        'emailEmpresa',
        'direccionEmpresa',
        'imagen',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function ofertas(){
        return $this->hasMany('App\Oferta');
    }
}
