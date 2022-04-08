<?php

namespace App\Http\Controllers;

use App\Instrucion;
use App\Http\Resources\Instruccion as InstruccionResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstruccionController extends Controller
{
    public function document(Instrucion $instrucion){
        return Storage::download( $instrucion->document.substr(6));
    }
    public function updateDocument(Request $request,Instrucion $instrucion){
        if($instrucion->document==""){

            $path2 = $request->document->store('public/instrucciondocument');
            $instrucion->document = $path2;
        }else{
            Storage::delete($instrucion->document);
            $path2 = $request->document->store('public/instrucciondocument');
            $instrucion->document = $path2;
        }
        $instrucion->save();
        return response()->json(new InstruccionResource($instrucion),200);
    }
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function index(User $user){
        $instrucion = $user->instruccion;
        return  response()->json(InstruccionResource::collection($instrucion),200) ;
    }
    public function show(Instrucion $instrucion){
        return response()->json(new InstruccionResource($instrucion),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'instruccion'=>'required|string|max:255',
            'nivelInstrucion'=>'required|string|max:255',
            'institucion'=> 'required|string|max:255',
            'especializacion'=>'required|string|max:255',
        ], self::$messages);
        $instrucion = new Instrucion($request->all());
        $path= $request->document->store('public/instrucciondocument');
        $instrucion->document= $path;
        $user->instruccion()->save($instrucion);
        return response()->json($instrucion,201);
    }
    public function update(Request $request,Instrucion $instrucion){
        $request->validate([
            'nivelInstrucion'=>'required|string|max:255',
            'institucion'=> 'required|string|max:255',
            'especializacion'=>'required|string|max:255',
        ], self::$messages);
        $instrucion->update($request->all());
        return response()->json($instrucion,200);
    }
    public function delete(Instrucion $instrucion){
        $instrucion->delete();
        return response()->json(null,204);
    }

}
