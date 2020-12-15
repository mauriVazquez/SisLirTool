@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center asd">
        <div class="col-md-8">
            <h1>Revisiones</h1>
            <span class="text-muted text">Bienvenido {{ Auth::user()->name}}, Estas son las revisiones en las que estas vinculado actualmente.</span>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Ultima modificacion</th>
                        <th>Modificado Por</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
