<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\RevisionRequest;
use App\Models\Biblioteca;
use App\Models\Metadato;
use App\Models\Revision;
use App\Models\User;
use App\Models\Validacion;
use App\Models\Criterio;
use App\Models\PreguntaDeInvestigacion;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('revisiones.create', ['users' => User::all()->except([Auth::user()->id]), 'revision' => new Revision()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevisionRequest $request)
    {
        $revision = new Revision();

        $revision->titulo = $request->titulo;
        $revision->estado = 'A1';
        $revision->meta_necesidad_informacion = $request->meta_necesidad_informacion;
        
        $revision->created_by = Auth::user()->id;
        $revision->updated_by = Auth::user()->id;

        $revision->save();

        foreach($request->investigadores as $investigador)
            $revision->investigadores()->attach($investigador);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function show(Revision $revision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function edit(Revision $revision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revision $revision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revision $revision)
    {
        //
    }

    public function protocoloBusqueda(Request $request, Revision $revision)
    {

       return view('revisiones.protocoloBusqueda', ['revision'=>$revision, 'metadatos' => Metadato::all() , 'bibliotecas' => Biblioteca::all()]);
    }

    public function protocoloBusqueda_store(Request $request, Revision $revision)
    {
        
        $revision->cadena_de_busqueda = $request->cadena_de_busqueda;
        $revision->metadatos()->detach();
        foreach ($request->metadatos as $key => $value) {
            $revision->metadatos()->attach($value);
        }

        $revision->bibliotecas()->detach();
        foreach ($request->bibliotecas as $key => $value) {
            $revision->bibliotecas()->attach($value);
        }

        
        $revision->updated_at = now();
        $revision->updated_by = Auth::user()->id;
        $revision->save();
        
        return redirect()->route('revision.criterios', $revision);
    }

    public function formulario_extraccion(Revision $revision)
    {
        return view('revisiones.formulario_extraccion', ['revision'=>$revision]);
    }

    public function formulario_extraccion_store(Request $request, Revision $revision)
    {

        $revision->formulario_extraccion = $request->campos;
        
        $revision->updated_at = now();
        $revision->updated_by = Auth::user()->id;
        $revision->save();
        return redirect()->route('revision.validacion', $revision);
    }

    public function validacion(Revision $revision)
    {
        return view('revisiones.validacion', ['revision' => $revision]);
    }

    public function validacion_store(Revision $revision, Request $request)
    {
        if(isset($request['mejoras'])){
            $validacion = new Validacion;
            
            $validacion->revision_id = $revision->id;
            $validacion->mejoras = json_encode($request['mejoras']);
            $validacion->resuelto = false;

            $validacion->created_by = Auth::user()->id;
            $validacion->updated_by = Auth::user()->id;
            
            $validacion->save();
    
            return redirect()->route('revision.mejora_diseno', ['revision' => $revision,'validacion' => $validacion]);
        }else{
            
            $revision->estado = 'A2';

            return redirect()->route('revision.prueba_piloto', ['revision' => $revision]);
        }

    }

    public function mejora_diseno(Revision $revision, Validacion $validacion)
    {
        
        return view('revisiones.mejora_diseno', ['revision' => $revision,'validacion' => $validacion->orderBy('created_at', 'desc')->first(), 'metadatos' => Metadato::all() , 'bibliotecas' => Biblioteca::all()]);
    }

    public function mejora_diseno_store(Request $request, Revision $revision, Validacion $validacion)
    {

        if(isset($request->meta_necesidad_informacion))
            $revision->meta_necesidad_informacion = $request->meta_necesidad_informacion;

        if(isset($request->preguntas)){
            PreguntaDeInvestigacion::where('revision_id', $revision->id)->delete();

            foreach ($request->preguntas as $key => $value) {
                $pregunta = New PreguntaDeInvestigacion();
                $pregunta->pregunta = $value;
                $pregunta->revision_id = $revision->id;
                $pregunta->created_by = Auth::user()->id;
                $pregunta->updated_by = Auth::user()->id;
                $pregunta->save();
            }
        }
        if(isset($request->cadena_de_busqueda))
            $revision->cadena_de_busqueda = $request->cadena_de_busqueda;
        if(isset($request->metadatos)){
            $revision->metadatos()->detach();
            foreach ($request->metadatos as $key => $value) {
                $revision->metadatos()->attach($value);
            }
        }
        if(isset($request->bibliotecas)){
            $revision->bibliotecas()->detach();
            foreach ($request->bibliotecas as $key => $value) {
                $revision->bibliotecas()->attach($value);
            }
        }

        if(isset($request->criterios)){
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
        }

        if(isset($request->campos))
            $revision->formulario_extraccion = $request->campos;


        $revision->updated_at = now();
        $revision->updated_by = Auth::user()->id;
        $revision->save();

        return redirect()->route('revision.validacion', $revision);
    }

}
