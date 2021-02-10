@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
           
            <h2 class="mt-4 mb-4">Diseñar la revisión - {{ $revision->titulo }}</h2>

            <div class="card mb-4" >
                <div class="card-body">
                  <h5 class="card-title text-center">Artefactos de entrada</h5>
                  <h6 class="card-subtitle mb-2 text-muted"><b> Meta de necesidad de informacion</b></h6>
                  <ul><p class="card-text">{{$revision->meta_necesidad_informacion}}</p></ul>
                  {{-- <a href="#" class="card-link">Another link</a> --}}
                
                <h6 class="card-subtitle mb-2 text-muted"><b> Preguntas de investigacion </b> </h6>
                <ul>
                    @foreach ($revision->preguntas as $pregunta)
                        <li>{{$pregunta->pregunta}}</li>
                    @endforeach
                </ul>

            </div>
            </div>


            <form action="{{ route('protocoloBusqueda.store', $revision)}}" method="post" class="mt-4">
                @csrf
                <h4>Protocolo de busqueda</h4>
                <div class="form-group">
                    <label for="cadena_de_busqueda">Cadena de busqueda</label>
                    <input type="text" class="form-control" id="cadena_de_busqueda" name="cadena_de_busqueda" aria-describedby="cadena_de_busqueda" value="{{ old('cadena_de_busqueda', $revision->cadena_de_busqueda)}}">
                    <small id="cadena_de_busqueda" class="form-text text-muted"></small>
                </div>
                <h4>Metadatos</h4>
                <h5>Seleccione los metadatos <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createMetadato">Agregar metadato</button></h5>
               <div class="form-group">
                @foreach ($metadatos as $metadato)
                       
                 
                @endforeach
                   <select name="metadatos[]" id="metadatos" class="metadatos form-control" multiple>
                       @foreach ($metadatos as $metadato)
                       
                       {{$revision->metadatos->where('id',$metadato->id)}}
                        <option value="{{$metadato->id}}" @if( count($revision->metadatos->where('id',$metadato->id)) )selected @endif >{{$metadato->nombre}}</option>
                    @endforeach
                </select> 
                </div>
                <h4>Bibiliotecas</h4>
                <h5>Seleccione las bibliotecas <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createBiblioteca">Agregar biblioteca</button></h5>
                <div class="form-group">
                    <select name="bibliotecas[]" id="bibliotecas" class="bibiliotecas form-control" multiple>
                        @foreach ($bibliotecas as $biblioteca)
                        <option value="{{$biblioteca->id}}" @if( count($revision->bibliotecas->where('id',$biblioteca->id)) )selected @endif>{{$biblioteca->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-block btn-success"> Siguiente </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createMetadato" tabindex="-1" aria-labelledby="createMetadatoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createMetadatoLabel">Nuevo Metadato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body mb-4">
                <form action="" id="metadato-form">
                    @csrf
                    <div class="form-group">
                        <label for="nuevoMetadato">Nuevo metadato</label>
                        <input type="text" class="form-control" name="nombre" id="nuevoMetadato">
                    </div>

                    <button class="btn btn-block btn-success" type="submit">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createBiblioteca" tabindex="-1" aria-labelledby="createBibliotecaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createBibliotecaLabel">Nueva Bibilioteca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mb-4">
            <form action="" id="biblioteca-form">
                @csrf
                <div class="form-group">
                    <label for="nuevaBiblioteca">Nueva bibilioteca</label>
                    <input type="text" class="form-control" name="nombre" id="nuevaBiblioteca">
                </div>

                <button class="btn btn-block btn-success" type="submit">Agregar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
    
    <script  type="text/javascript">
        $(".metadatos").select2({
            theme: "classic"
        });
        $(".bibiliotecas").select2({
            theme: "classic"
        });

        $("#metadato-form").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: '{{ route("metadatos.create")}}',
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    var newOption = new Option(data.nombre, data.id, false, false);
                    $('.metadatos').append(newOption).trigger('change');
                    $('#createMetadato').modal('hide')
                }
                });


        });

        $("#biblioteca-form").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: '{{ route("bibliotecas.create")}}',
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    var newOption = new Option(data.nombre, data.id, false, false);
                    $('.bibiliotecas').append(newOption).trigger('change');
                    $('#createBiblioteca').modal('hide');
                }
                });


        });
    </script>

@endsection