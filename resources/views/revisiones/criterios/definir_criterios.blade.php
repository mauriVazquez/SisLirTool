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
                
                <h6 class="card-subtitle mb-2 text-muted"><b> Protocolo de Búsqueda </b> </h6>
                <p class="card-text text-muted">Cadena de Búsqueda:</p>
                <ul><p class="card-text">{{$revision->cadena_de_busqueda}}</p></ul>
                <p class="card-text text-muted">Metadatos:</p>
                <ul>
                    @foreach ($revision->metadatos as $metadato)
                        <li>{{$metadato->nombre}}</li>
                    @endforeach
                </ul>
                <p class="card-text text-muted">bibliotecas:</p>
                <ul>
                    @foreach ($revision->bibliotecas as $biblioteca)
                        <li>{{$biblioteca->nombre}}</li>
                    @endforeach
                </ul>
            </div>
            </div>

            <form action="{{ route('criterios.store', $revision)}}" method="post" class="mt-4">
                @csrf
                
                <h4>Incluir criterio:</h4>
                <div class="container mb-2"> 
                <div id="form-group">
                    <label for="tipo">Tipo:</label>
                    <select name="" id="tipo" class="form-control mb-2">
                        <option value="IN">inclusion</option>
                        <option value="EX">exclusion</option>
                        <option value="CA">calidad</option>
                    </select>
                    <label for='descripcion'>Descripcion:</label>
                    <input type="text" name="" maxlength="200" id="descripcion" class="form-control mb-2">

                    <li class="alert-dismissible clonable" style="display: none;">
                        <input type="text" class="form-control-plaintext texto" style="outline: 0px" name="" id="">
                        <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                        font-size: 30px;" class="close bg-danger borrar-criterio">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </li>
                    
                </div>
                <button type="button" class="btn btn-primary" id="insertar_criterio">Añadir criterio</button>
                </div>
                <h4>Listado de criterios</h4>
                <div class="container mb-4">
                    <h5>Criterios de Inclusión</h5>
                    <ul class="list-group mb-2" id="IN">

                        @isset($revision->criterios)
                            @foreach ($revision->criterios->where('tipo','inclusion') as $criterio)
                            <li class="list-group-item alert-dismissible">
                                <input type="text" class="form-control-plaintext texto" name="criterios[inclusion][]" style="outline: 0px"
                                    id="" value="{{ $criterio->descripcion }}">
                                <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                    font-size: 30px;" class="close bg-danger borrar-criterio">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </li>
                            @endforeach
                        @endisset

                    </ul>
                    <h5>Criterios de Exclusión</h5>
                    <ul class="list-group mb-2" id="EX">
                        @isset($revision->criterios)
                            @foreach ($revision->criterios->where('tipo','exclusion') as $criterio)
                            <li class="list-group-item alert-dismissible">
                                <input type="text" class="form-control-plaintext texto" name="criterios[exclusion][]" style="outline: 0px"
                                    id="" value="{{ $criterio->descripcion }}">
                                <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                    font-size: 30px;" class="close bg-danger borrar-criterio">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </li>
                            @endforeach
                        @endisset
                    </ul>
                    <h5>Criterios de Calidad</h5>
                    <ul class="list-group" id="CA">
                        @isset($revision->criterios)
                            @foreach ($revision->criterios->where('tipo','calidad') as $criterio)
                            <li class="list-group-item alert-dismissible">
                                <input type="text" class="form-control-plaintext texto" name="criterios[calidad][]" style="outline: 0px"
                                    id="" value="{{ $criterio->descripcion }}">
                                <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                    font-size: 30px;" class="close bg-danger borrar-criterio">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>

                <button type="submit" class="btn btn-block btn-success"> Siguiente </button>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    
    <script  type="text/javascript">
    $(function () {

            criterios = @json($revision->criterios)

            console.log(criterios);

            $('#insertar_criterio').click(function (){

                if(($('#descripcion').val().length > 2)){

                    clon = $('.clonable').clone(true).show().removeClass('clonable').addClass('list-group-item')
                    
                    $(clon).find('.texto').val($('#descripcion').val())
                    $(clon).find('.texto').attr('name','criterios[' +$('#tipo option:selected').text().replace(/ /g,'_').toLowerCase()+ '][]')
                    
                    $('#descripcion').val('')

                    console.log(clon)
                    $('#'+$('#tipo option:selected').val()).append(clon)
                }
            });

            $('.borrar-criterio').click(function(){
                $(this).parent().remove();
            })

        })
    </script>

@endsection