@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 mb-4">Mejorar diseño de la Revision Sistematica de literatura - {{ $revision->titulo }}</h2>
            <form action="{{ route('revision.mejora_diseno.store', [$revision, $validacion]) }}" method="post">
                @csrf
                @if (isset( $validacion->mejoras_json->{'meta-informacion'} ))
                    <div class="card mb-2">
                        <div class="card-body ">
                            <h4>Meta de necesidad de informacion</h4>
                            <div class="form-group">
                                <div class="alert alert-info" role="alert">
                                    <h5>Propuesta de mejora para la Meta de necesidad de información</h5>
                                    <p>{{ $validacion->mejoras_json->{'meta-informacion'} }}</p>
                                </div>
                                <label for="meta_necesidad_informacion">Meta de necesidad de información:</label>
                                <textarea class="form-control" name="meta_necesidad_informacion" id="meta_necesidad_informacion" rows="3">{{ old('meta_necesidad_informacion', $revision->meta_necesidad_informacion) }}</textarea>
                                @error('meta_necesidad_informacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <small id="meta_necesidad_informacion" class="form-text text-muted">Meta de necesidad de informacion</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif
                @if (isset($validacion->mejoras_json->preguntas))
                <div class="card mb-2">
                    <div class="card-body">
                        <h4>Preguntas de investigacion</h4>
                        <div class="alert alert-info" role="alert">
                            <h5>Propuesta de mejora para la Meta de necesidad de información</h5>
                            <p>{{ $validacion->mejoras_json->preguntas }}</p>
                        </div>
                        <div class='row mb-2'>
                            <div class='col-8'>
                                <input type="text" name="" class='form-control' id="pregunta">
                                <small id="pregunta" class="form-text text-muted">Preguntas de investigacion</small>
                            </div>
                            <div class='col-4'>
                                <button type="button" id='addPregunta' class="btn btn-block btn-primary">Añadir</button>
                            </div>
                        </div>
                        <ul class="list-group mb-4" id='listPregunta'>
                            <li class="alert-dismissible clonable-pregunta" style="display: none;">
                                <input type="text" class="form-control-plaintext texto" style="outline: 0px" name="" id="">
                                <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                font-size: 30px;" class="close bg-danger borrar-pregunta">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </li>

                            @if(is_array(old('preguntas')))
                                @foreach (old('preguntas') as $item)
                                <li class="list-group-item alert-dismissible">
                                    <input type="text" class="form-control-plaintext texto" name="preguntas[]" style="outline: 0px"
                                        id="" value="{{ $item }}">
                                    <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                        font-size: 30px;" class="close bg-danger borrar-pregunta">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </li>
                                @endforeach

                            @else
                                @isset($revision->preguntas)
                                    @foreach ($revision->preguntas as $pregunta)
                                    <li class="list-group-item alert-dismissible">
                                        <input type="text" class="form-control-plaintext texto" name="preguntas[]" style="outline: 0px"
                                            id="" value="{{ $pregunta->pregunta }}">
                                        <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                            font-size: 30px;" class="close bg-danger borrar-pregunta">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </li>
                                    @endforeach
                                @endisset
                            @endif
                        </ul>
                    </div>
                </div>
                @endif
                @if (isset($validacion->mejoras_json->protocolo))
                <div class="card mb-2">
                    <div class="card-body">
                        <h4>Protocolo de busqueda</h4>
                        <div class="alert alert-info" role="alert">
                            <h5>Propuesta de mejora para la Meta de necesidad de información</h5>
                            <p>{{ $validacion->mejoras_json->protocolo }}</p>
                        </div>
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
                    </div>
                </div>
                @endif
                @if (isset($validacion->mejoras_json->criterios))
                <div class="card mb-2">
                    <div class="card-body">
                        <h4>Criterios</h4>
                        <div class="alert alert-info" role="alert">
                            <h5>Propuesta de mejora para los criterios</h5>
                            <p>{{ $validacion->mejoras_json->criterios }}</p>
                        </div>
                        <h5>Incluir criterio:</h5>
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
        
                            <li class="alert-dismissible clonable-criterio" style="display: none;">
                                <input type="text" class="form-control-plaintext texto" style="outline: 0px" name="" id="">
                                <button type="button" style="outline: 0px; height: 100%; text-shadow: 0 0 black;
                                font-size: 30px;" class="close bg-danger borrar-criterio">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </li>
                            
                        </div>
                        <button type="button" class="btn btn-primary" id="insertar_criterio">Añadir criterio</button>
                        </div>
                        <h5>Listado de criterios</h5>
                        <div class="container mb-4">
                            <h6>Criterios de Inclusión</h6>
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
                            <h6>Criterios de Exclusión</h6>
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
                            <h6>Criterios de Calidad</h6>
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
                    </div>
                </div>

                @endif
                @if (isset($validacion->mejoras_json->formulario))
                    <div class="card mb-2">
                        <div class="card-body">
                            <h3>Formulario de extracción de datos</h3>
                            <div class="alert alert-info" role="alert">
                                <h5>Propuesta de mejora para el formulario de extracción de datos</h5>
                                <p>{{ $validacion->mejoras_json->formulario }}</p>
                            </div>
                            <h4>Administrar campos del formulario</h4>
                            <div id="form-group">
                                <label for='descripcion-campo'>Nuevo Campo:</label>
                                <input type="text" name="" maxlength="200" id="descripcion-campo" class="form-control mb-2">

                                <button type="button" class="btn btn-secondary btn-right float-right" id="insertar_campo"> Agregar campo</button>
                                
                            </div>
                            <h3 class="mt-5 ">Esquema del formulario:</h3>
                            <table class="table" id="">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Campos</th>
                                    <th scope="col-2"></th>
                                </tr>
                                </thead>
                                    <tbody id="tabla_campos_form">
                                        <tr class="clonable-campo" style="display: none;">
                                            <td>
                                                <input type="text" class="form-control-plaintext texto"  style="outline: 0px" name="" id="">
                                            </td>
                                            <td>
                                                <button class="btn btn-link text-danger eliminar-campo float-right"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg></button>
                                            </td>
                                        </tr>

                                        @if (isset($revision->formulario_extraccion))
                                        @foreach (json_decode($revision->formulario_extraccion) as $campo)
                                            <tr>
                                            <td><input type="text" class="form-control-plaintext texto" readonly style="outline: 0px" name="campos[]" value="{{ $campo }}" id=""></td>
                                            <td>
                                                @if($campo != "Nombre del investigador" && $campo != "PID - Titulo del articulo" && $campo != "Autores del articulo")
                                                <button class="btn btn-link text-danger eliminar-campo float-right"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg></button>
                                                @endif
                                            </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td > <input type="text" class="form-control-plaintext texto" readonly style="outline: 0px" name="campos[]" value="Nombre del investigador" id=""></td>
                                                <td > </td>
                                            </tr>
                                            <tr >
                                                <td><input type="text" class="form-control-plaintext texto" readonly style="outline: 0px" name="campos[]" value="PID - Titulo del articulo" id=""></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control-plaintext texto" readonly style="outline: 0px" name="campos[]" value="Autores del articulo" id=""></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                @endif

                <button type="submit" class="btn btn-block btn-success"> Crear </button>


                
            </form>
        </div>
    </div>
</div>

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
    <script type="text/javascript">

            $(".metadatos").select2({
                theme: "classic"
            });
            $(".bibiliotecas").select2({
                theme: "classic"
            });

        $(function() {

            $('#insertar_campo').click(function (){

            if(($('#descripcion-campo').val().length > 2)){

                clon = $('.clonable-campo').clone(true).show().removeClass('clonable-campo')
                
                $(clon).find('.texto').val($('#descripcion-campo').val())
                $(clon).find('.texto').attr('name','campos[]')
                
                $('#descripcion-campo').val('')

                console.log(clon)
                $('#tabla_campos_form').append(clon)
            }
            });

            $('.eliminar-campo').click(function(){
            $(this).parent().parent().remove();
            })
        
            $('#addPregunta').click(function (event){

            if($('#pregunta').val().length > 2){
            clon = $('.clonable-pregunta').clone(true).show().removeClass('clonable-pregunta').addClass('list-group-item')

            $(clon).find('.texto').attr('name','preguntas[]')
            $(clon).find('.texto').val($('#pregunta').val())
            $('#pregunta').val('')
            $("#listPregunta").append(clon);
            }
            })
            $('.borrar-pregunta').click(function(){
                $(this).parent().remove();
            })

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

            criterios = @json($revision->criterios)

            console.log(criterios);

            $('#insertar_criterio').click(function (){

                if(($('#descripcion').val().length > 2)){

                    clon = $('.clonable-criterio').clone(true).show().removeClass('clonable-criterio').addClass('list-group-item')
                    
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