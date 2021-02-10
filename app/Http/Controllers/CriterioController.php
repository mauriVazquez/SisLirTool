<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Criterio;
use App\Models\Revision;
class CriterioController extends Controller
{
    //

    public function criterios(Revision $revision){
 
        return view('revisiones.criterios.definir_criterios', ['revision' => $revision]);

    }

    public function store(Request $request, Revision $revision){
        

        Criterio::where('revision_id', $revision->id)->delete();
        foreach ($request->criterios as $key => $array) {
            foreach ($array as $value) {
                $criterio = new Criterio;
                $criterio->descripcion = $value;
                $criterio->tipo = $key;
                $criterio->revision_id = $revision->id;
                $criterio->created_by = Auth::user()->id;
                $criterio->updated_by = Auth::user()->id;

                $criterio->save();
            }  
        }

        $revision->updated_by = Auth::user()->id;
        $revision->save();
        return redirect()->route('revision.formulario_extraccion', $revision);
    }
}
