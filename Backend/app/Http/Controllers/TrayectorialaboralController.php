<?php

namespace App\Http\Controllers;

use App\Http\Resources\Trayectorialaboral as TrayectorialaboralResources;
use App\Trayectorialaboral;
use App\User;
use Illuminate\Http\Request;

class TrayectorialaboralController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function index(User $user){
        return response()->json(TrayectorialaboralResources::collection($user->trayectoriasLaboral),200);
    }
    /*public function show(User $user, Trayectorialaboral $trayectorialaboral){
        return response()->json($user->trayectoriasLaboral()->where('id',$trayectorialaboral->id)->firstOrFail(),200);
    }*/
    public function show(Trayectorialaboral $trayectorialaboral){
        return response()->json(new TrayectorialaboralResources($trayectorialaboral),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'empresa'=>'required|string|max:255',
            'puestoTrabajo'=> 'required|string|max:255',
            'responsabilidades'=>'required|string|max:255',
            'fechaInicio'=>'required',
            'fechaSalida'=>'required',
            'contacto'=>'required|string|max:10',
            //'user_id'=>'required|exists:users,id',
        ], self::$messages);
        $trayectorialaboral =$user->trayectoriasLaboral()->save(new Trayectorialaboral($request->all()));
        return response()->json($trayectorialaboral,201);
    }
    public function update(Request $request,Trayectorialaboral $trayectorialaboral, User $user){
        $request->validate([
            'empresa'=>'required|string|max:255',
            'puestoTrabajo'=> 'required|string|max:255',
            'responsabilidades'=>'required|string|max:255',
            'fechaInicio'=>'required',
            'fechaSalida'=>'required',
            'contacto'=>'required|string|max:10',
        ], self::$messages);
        $trayectorialaboral->update($request->all());
        return response()->json($trayectorialaboral,200);
    }
    public function delete(Trayectorialaboral $trayectorialaboral){
        $trayectorialaboral->delete();
        return response()->json(null,204);
    }

}
