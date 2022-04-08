<?php

namespace App\Http\Controllers;

use App\Http\Resources\Idioma as IdiomaResource;
use App\Idioma;
use App\User;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function index(User $user){
        return  response()->json(IdiomaResource::collection($user->idioma),200);
    }
    public function show(Idioma $idioma){
        return response()->json(new IdiomaResource($idioma),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'idioma'=>'required|string|max:255',
            'nivel'=> 'required|max:3',
        ],self::$messages);
        $idioma =$user->idioma()->save(new Idioma($request->all()));
        return response()->json($idioma,201);
    }
    public function update(Request $request,Idioma $idioma, User $user){
        $request->validate([
            'idioma'=>'required|string|max:255',
            'nivel'=> 'required|max:3',
        ], self::$messages);
        $idioma->update($request->all());
        return response()->json($idioma,200);
    }
    public function delete(Idioma $idioma){
        $idioma->delete();
        return response()->json(null,204);
    }

}
