<?php

namespace App\Http\Controllers;

use App\Habilidad;
use App\Http\Resources\Habilidad as HabilidadResource;
use Illuminate\Http\Request;
use App\User;

class HabilidadController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function index(User $user){
        $habilidad = $user->habilidad;
        return  response()->json(HabilidadResource::collection($habilidad),200) ;
    }
    public function show(Habilidad $habilidad){
        return response()->json(new HabilidadResource($habilidad),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'descripcion'=>'required|string|max:255',
            'dominio'=> 'required|max:3',
            'habilidad'=>'required|string|max:255',
        ],self::$messages);
        $habilidad =$user->habilidad()->save(new Habilidad($request->all()));
        return response()->json($habilidad,201);
    }
    public function update(Request $request,Habilidad $habilidad){
        $request->validate([
            'descripcion'=>'required|string|max:255',
            'dominio'=> 'required|max:3',
            'habilidad'=>'required|string|max:255',
        ], self::$messages);
        $habilidad->update($request->all());
        return response()->json($habilidad,200);
    }
    public function delete(Habilidad $habilidad){
        $habilidad->delete();
        return response()->json(null,204);
    }

}
