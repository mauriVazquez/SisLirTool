@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 mb-4">Comenzar un nuevo proyecto de revision</h2>
            <form action="{{ route('revisiones.store', $revision) }}" method="post">
                
                @include('revisiones._form')

                <button type="submit" class="btn btn-block btn-success"> Crear </button>


                
            </form>
        </div>
    </div>
</div>
@endsection