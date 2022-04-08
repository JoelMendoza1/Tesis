<?php

namespace App\Http\Controllers;

use App\Capacitacion;
use Illuminate\Http\Request;
use App\Http\Resources\Capacitacion as CapacitacionResource;
use App\User;
use Illuminate\Support\Facades\Storage;

class CapacitacionController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function updateDocument(Request $request,Capacitacion $capacitacion){
        if($capacitacion->document==""){

            $path2 = $request->document->store('public/capacitaciondocument');
            $capacitacion->document = $path2;
        }else{
            Storage::delete($capacitacion->document);
            $path2 = $request->document->store('public/capacitaciondocument');
            $capacitacion->document = $path2;
        }
        $capacitacion->save();
        return response()->json(new CapacitacionResource($capacitacion),200);
    }
    public function document(Capacitacion $capacitacion){
        return Storage::download( $capacitacion->document.substr(6));
    }
    public function index(User $user){
        return response()->json(CapacitacionResource::collection($user->capacitacion),200);
    }
    public function show(Capacitacion $capacitacion){
        return response()->json(new CapacitacionResource($capacitacion),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'nombreCapacitacion'=>'required|string|max:255',
            'nombreInstitucionCapacitadora'=> 'required|string',
            'fechaInicioCapacitacion'=>'required|string',
            'fechaFinCapacitacion'=>'required|string',
        ], self::$messages);
        $capacitacion= new Capacitacion($request->all());
        $path= $request->document->store('public/capacitaciondocument');
        $capacitacion->document=$path;
        $user->capacitacion()->save($capacitacion);
        return response()->json($capacitacion,201);
    }
    public function update(Request $request,Capacitacion $capacitacion){
        $request->validate([
            'nombreCapacitacion'=>'required|string|max:255',
            'nombreInstitucionCapacitadora'=> 'required|string',
            'fechaInicioCapacitacion'=>'required|string',
            'fechaFinCapacitacion'=>'required|string',
        ], self::$messages);
        $capacitacion->update($request->all());
        return response()->json($capacitacion,200);
    }
    public function delete(Capacitacion $capacitacion){
        $capacitacion->delete();
        return response()->json(null,204);
    }

}
