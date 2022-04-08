<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Oferta extends Model
{
    protected $fillable =[
        'oferta',
        'fechaOferta',
        'descripcionOferta',
        'horario',
        'numberoPostulantes',
        'direcionOferta',
        'carreraOferta',
        'visible',
        'empresa_id'
    ];
    public function postulacion(){
        return $this->hasMany('App\Postulacion');
    }
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

}
