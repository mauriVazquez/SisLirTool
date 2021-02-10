<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Revision;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    //
    public function store(Request $request , Revision $revision)
    {
        $articulo = new Articulo();
        
        $array['pid'] = $revision->prueba_piloto->articulos->count() + 1;
        $articulo->extras = array_merge($request->extras, $array);
        $articulo->titulo = $request->titulo;

        if(isset($request->archivo)){
            $type = $request->archivo->getClientOriginalExtension();
                $path = 'public/articulos/'.$revision->id;
                if(isset($request->prueba_piloto_id))
                    $path .= '/'.'prueba_piloto/'.$request->prueba_piloto_id;
                $url = $request->archivo->storeAs($path ,preg_replace('/\s+/', '_', $request->titulo).'.'.$type);
                $articulo->archivo = str_replace('public','storage',$url);
        }

        if(isset($request->prueba_piloto_id))
            $articulo->prueba_piloto_id = $request->prueba_piloto_id;

        $articulo->aceptado = false;
        $articulo->revision_id = $revision->id;
        $articulo->leido = false;
        $articulo->formulario_de_extraccion = $revision->formulario_extraccion;

        $articulo->created_by = Auth::user()->id;
        $articulo->updated_by = Auth::user()->id;

        $articulo->save();

        return redirect()->route('revision.prueba_piloto.cargar_articulos', ['revision' => $revision]);
    }


    public function show(Articulo $articulo)
    {
        return $articulo;
    }
}
