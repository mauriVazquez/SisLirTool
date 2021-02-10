<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Metadato;

class MetadatoController extends Controller
{
    //
    public function store(Request $request)
    {
        $metadato = new Metadato();

        $metadato->nombre = $request->nombre;

        $metadato->created_by = Auth::user()->id;
        $metadato->updated_by = Auth::user()->id;

        $metadato->save();

        return $metadato;
    }
}
