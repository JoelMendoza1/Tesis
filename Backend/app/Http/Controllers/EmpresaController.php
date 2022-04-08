<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\Empresa as EmpresaResourse;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        //'body,required'=>'El body no es valido'
    ];
    public function updateImgen(Request $request,Empresa $empresa){
        if($empresa->imagen==""){
            $path2 = $request->image -> store('public/empresasimages');
            $empresa->imagen = $path2;
        }else{
            Storage::delete($empresa->image);
            $path2 = $request->image -> store('public/empresasimages');
            $empresa->imagen = $path2;
        }
        $empresa->save();
        return response()->json(new EmpresaResourse($empresa),200);
    }
    public function index(User $user){

        return response()->json(EmpresaResourse::make($user->empresa),200);
    }

    public function show(Empresa $empresa){
        return response()->json(new EmpresaResourse($empresa),200);
    }
    public function store(Request $request, User $user){
        $request->validate([
            'RUC' => 'required|string|max:13',
            'nombreEmpresa' => 'required|string|max:255',
            'tipoEmpresa' => 'required|string|max:255',
            'telefonoEmpresa' => 'required|string|max:10|min:9',
            'emailEmpresa' => 'required|string|email|max:255',
            'direccionEmpresa'=> 'required|string|max:255',
        ], self::$messages);
        $empresa = new Empresa($request->all());
        $path = $request->image -> store('public/empresasimages');
        $empresa->imagen = $path;
        $user->empresa()->save($empresa);
        return response()->json($empresa,201);
    }
    public function update(Request $request,Empresa $empresa){
        $request->validate([
            'RUC' => 'required|string|max:13',
            'nombreEmpresa' => 'required|string|max:255',
            'tipoEmpresa' => 'required|string|max:255',
            'telefonoEmpresa' => 'required|string|max:10|min:9',
            'emailEmpresa' => 'required|string|email|max:255',
            'direccionEmpresa'=> 'required|string|max:255',
            //'user_id'=> 'required|exists:users,id',
        ], self::$messages);
        $empresa->update($request->all());
        return response()->json($empresa,200);
    }
    public function delete(Empresa $empresa){
        $empresa->delete();
        return response()->json(null,204);
    }
}
