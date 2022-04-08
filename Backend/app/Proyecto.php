<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Proyecto extends Model
{
    //
    protected $fillable = [
        'proyecto',
        'link',
        'description'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    /*public static function boot(){
        static::creating(function ($user) {
            $user->user_id = Auth::id();
        });
    }*/
}
