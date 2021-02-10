<?php

namespace App\Http\Controllers;

use App\Models\PreguntaDeInvestigacion;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreguntaDeInvestigacionController extends Controller
{
    //


    public function preguntas(Revision $revision){
 
        return view('revisiones.preguntas.listar', ['revision' => $revision]);

    }

    public function store(Request $request, Revision $revision){
        
        PreguntaDeInvestigacion::where('revision_id', $revision->id)->delete();

        foreach ($request->preguntas as $key => $value) {

            $pregunta = New PreguntaDeInvestigacion();
            $pregunta->pregunta = $value;
            $pregunta->revision_id = $revision->id;

            $pregunta->created_by = Auth::user()->id;
            $pregunta->updated_by = Auth::user()->id;

            $revision->updated_at = now();
            $revision->updated_by = Auth::user()->id;

            $pregunta->save();

            
        }
        return redirect()->route('revision.protocoloBusqueda',$revision);
    }
}
