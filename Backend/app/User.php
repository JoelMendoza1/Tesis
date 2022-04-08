<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'identificationCard',
        'telephoneNumber',
        'address',
        'dateOfBirth',
        'career',
        'institution',
        'semester',
        'totalSemestrerCarrer',
        'request',
        'descriptionRequest',
        'image',
        'document',
        'typeUser'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }
    public function solicitudAprobacion(){
        return $this->hasMany('App\Solicitudaprobacion');
    }

    public function capacitacion(){
        return $this->hasMany('App\Capacitacion');
    }
    public function trayectoriasLaboral(){
        return $this->hasMany('App\Trayectorialaboral');
    }
    public function proyecto(){
        return $this->hasMany('App\Proyecto');
    }
    public function instruccion(){
        return $this->hasMany('App\Instrucion');
    }
    public function habilidad(){
        return $this->hasMany('App\Habilidad');
    }
    public function idioma(){
        return $this->hasMany('App\Idioma');
    }
    public function empresa(){
        return $this->hasOne('App\Empresa');
    }
    public function postulacion(){
        return $this->hasMany('App\Postulacion');
    }
}
