<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\RevisionRequest;
use App\Models\Biblioteca;
use App\Models\Metadato;
use App\Models\Revision;
use App\Models\User;
use App\Models\Validacion;
use App\Models\PruebaPiloto;

class PruebaPilotoController extends Controller
{
    public function prueba_piloto(Revision $revision)
    {
        
        return view('revisiones.prueba_piloto', ['revision' => $revision]);
    }

    public function prueba_piloto_decision(Request $request, Revision $revision)
    {
        if($request->prueba_piloto == 'si'){
            $prueba_piloto = new PruebaPiloto;

            $prueba_piloto->created_by = Auth::user()->id;
            $prueba_piloto->updated_by = Auth::user()->id;

            $prueba_piloto->save();
            $revision->prueba_piloto_id = $prueba_piloto->id;
            $revision->save();

            $revision->updated_by = Auth::user()->id;

            return redirect()->route('revision.prueba_piloto.seleccionar_bibliotecas', ['revision' => $revision ]);
        }

        if($request->prueba_piloto == 'no'){
            $revision->prueba_piloto = null;
            return redirect()->route('revision.ejecutar', ['revision' => $revision]);
        }
        
    }

    
    public function seleccionar_bibliotecas(Revision $revision)
    {
        
        return view('revisiones.prueba_piloto.seleccionar_bibliotecas', ['revision' => $revision]);
    }

    public function bibliotecas_seleccionadas(Request $request, Revision $revision)
    {
        

        $revision->prueba_piloto->bibliotecas()->detach();
        foreach ($request->bibliotecas as $key => $value) {
            $revision->prueba_piloto->bibliotecas()->attach($value);
        }
        return redirect()->route('revision.prueba_piloto.cargar_articulos', ['revision' => $revision]);
    }

    public function cargar_articulos(Revision $revision)
    {
        
        return view('revisiones.prueba_piloto.cargar_articulos', ['revision' => $revision]);
    }


    public function aplicar_criterios(Revision $revision)
    {
        
        return view('revisiones.prueba_piloto.aplicar_criterios', ['revision' => $revision]);
    }

}
