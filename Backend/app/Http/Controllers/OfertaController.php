<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Oferta;
use App\Http\Resources\Oferta as OfertaResource;
use App\Http\Resources\OfertaCollection;
use App\User;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    private static $messages=[
        'required'=>'El campo o atributo es obligatorio',
        'oferta,required'=>'Oferta no valida',
            'descripcionOferta,required'=>'Descripción no valida',
            'horario,required'=>'Horario no valida',
            'numberoPostulantes,required'=>'Horario no valida',
            'direcionOferta,required'=>'Descripcion no valida',
            'carreraOferta,required'=>'Carrera no valida',
        //'body,required'=>'El body no es valido'
    ];
    public function index(){
        $oferta=Oferta::orderBy('id', 'DESC')->where('visible', 'LIKE', 1)->get();
        return response()->json( OfertaResource::collection($oferta),200);
    }
    public function index1(Empresa $empresa){
        $oferta= $empresa->ofertas;
        return response()->json( OfertaResource::collection($oferta),200);
        //return response()->json(CommentResource::collection($article->comments->sortByDesc('created_at')), 200);
    }
    public function index2(Empresa $empresa){
        $oferta= $empresa->ofertas->where('visible','LIKE',1);
        return response()->json( OfertaResource::collection($oferta),200);
        //return response()->json(CommentResource::collection($article->comments->sortByDesc('created_at')), 200);
    }
    public function index3(Empresa $empresa){
        $oferta=  $empresa->ofertas->where('visible','LIKE',0);
        return response()->json( OfertaResource::collection($oferta),200);
        //return response()->json(CommentResource::collection($article->comments->sortByDesc('created_at')), 200);
    }
    public function show(Oferta $oferta){
        return response()->json(new OfertaResource($oferta),200);
    }
    /*public function show(Oferta $oferta, Empresa $empresa){
        return response()->json($empresa->ofertas()->where('id',$oferta->id)->firstOrFail(),200);
    }*/
    public function store(Request $request, Empresa $empresa ){
        $request->validate([
            'oferta'=>'required|string|max:255',
            'descripcionOferta'=>'required|string|max:255',
            'horario'=>'required|string',
            'numberoPostulantes'=>'required|max:2',
            'direcionOferta'=>'required|string|max:255',
            'carreraOferta'=>'required|string|max:255',
            'visible'=>'required|boolean',
        ]);
        $oferta = $empresa->ofertas()->save(new Oferta($request->all()));
        return response()->json($oferta,201);
    }
    public function update(Request $request,Oferta $oferta){
        $oferta->update($request->all());
        return response()->json($oferta,200);
    }
    public function delete(Oferta $oferta){
        $oferta->delete();
        return response()->json(null,204);
    }

}
