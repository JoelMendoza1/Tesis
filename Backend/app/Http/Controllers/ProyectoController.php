<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Http\Resources\Proyecto as ProyectoResource;
use App\User;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function index(User $user){
        $proyecto = $user->proyecto;
        return  response()->json(ProyectoResource::collection($proyecto),200) ;
    }
    public function show(Proyecto $proyecto){
        return response()->json(new ProyectoResource($proyecto),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'proyecto'=>'required|string|max:255',
            'link'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            //'user_id'=>'required|exists:users,id',
        ],self::$messages);
        $proyecto =$user->proyecto()->save(new Proyecto($request->all()));
        return response()->json($proyecto,201);
    }
    public function update(Request $request,Proyecto $proyecto, User $user){
        $request->validate([
            'proyecto'=>'required|string|max:255',
            'link'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            //'user_id'=>'required|exists:users,id',
        ], self::$messages);
        $proyecto->update($request->all());
        return response()->json($proyecto,200);
    }
    public function delete(Proyecto $proyecto){
        $proyecto->delete();
        return response()->json(null,204);
    }

}
