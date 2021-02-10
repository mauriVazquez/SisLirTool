@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 mb-4">Seleccionar la Biblioteca a utilizar</h2>
            <form action="{{ route('revision.prueba_piloto.bibliotecas_seleccionadas', $revision) }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="bibliotecas">Seleccione un subconjunto de Bibliotecas</label>
                        <select id="bibliotecas" name="bibliotecas[]" class="form-control bibiliotecas" multiple>
                        @foreach($revision->bibliotecas as $bibilioteca)
                        <option value="{{$bibilioteca->id}}">{{$bibilioteca->nombre}}</option>
                        @endforeach
                        </select>
                    </div>

                <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(".bibiliotecas").select2({
            theme: "classic"
        });
    </script>
@endsection