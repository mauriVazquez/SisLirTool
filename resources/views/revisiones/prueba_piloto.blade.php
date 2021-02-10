@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 mb-4">Desea realizar una prueba Piloto?</h2>
            <form action="{{ route('revision.prueba_piloto.decision', $revision) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="opcion_prueba">Seleccione una opción</label>
                    <select id="opcion_prueba" name="prueba_piloto" class="form-control">
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Continuar</button>

            </form>
        </div>
    </div>
</div>
@endsection