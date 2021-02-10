<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Evaluacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    public function store(Request $request)
    {

        $evaluacion = new Evaluacion();

        $evaluacion->articulo_id = $request->articulo_id;
        $evaluacion->resultado = $request->criterios;
        $evaluacion->user_id = Auth::user()->id;
        
        $evaluacion->save();

        $articulo = Articulo::findOrFail($request->articulo_id);
        $articulo->aceptado = true;

        foreach ($evaluacion->resultado as $key => $value) {
           if($value === 'rechazado')
                $articulo->aceptado = false;
        }

        $articulo->save();
        return  $articulo;
    }
}
