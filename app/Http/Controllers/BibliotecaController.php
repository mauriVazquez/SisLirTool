<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Biblioteca;

class BibliotecaController extends Controller
{
    public function store(Request $request)
    {
        $biblioteca = new Biblioteca();

        $biblioteca->nombre = $request->nombre;

        $biblioteca->created_by = Auth::user()->id;
        $biblioteca->updated_by = Auth::user()->id;

        $biblioteca->save();

        return $biblioteca;
    }
}
