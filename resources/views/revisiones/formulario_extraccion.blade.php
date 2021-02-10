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

                <h6 class="card-subtitle mb-2 text-muted"><b> Criterios de calidad </b> </h6>
                <ul>
                    @foreach ($revision->criterios->where('tipo','calidad') as $criterio)
                        <li>{{$criterio->descripcion}}</li>
                    @endforeach
                </ul>

            </div>
            </div>

            <form action="{{ route('formulario_extraccion.store', $revision)}}" method="post" class="mt-4">
                @csrf
                <h3>Administrar campos del formulario</h3>
                <div id="form-group">
                    <label for='descripcion'>Nuevo Campo:</label>
                    <input type="text" name="" maxlength="200" id="descripcion" class="form-control mb-2">

                    <button type="button" class="btn btn-secondary btn-right float-right" id="insertar_campo"> Agregar campo</button>
                    
                </div>
                <h3 class="mt-5 ">Esquema del formulario:</h3>
                <table class="table" id="tabla_campos_form">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Campos</th>
                        <th scope="col-2"></th>
                    </tr>
                    </thead>
                    <tbody id="tabla_campos_form">
                        <tr class="clonable" style="display: none;">
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
                <button type="submit" class="btn btn-block btn-success"> Siguiente </button>
            </form>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    
    <script  type="text/javascript">
        $(function () {

        $('#insertar_campo').click(function (){

            if(($('#descripcion').val().length > 2)){

                clon = $('.clonable').clone(true).show().removeClass('clonable')
                
                $(clon).find('.texto').val($('#descripcion').val())
                $(clon).find('.texto').attr('name','campos[]')
                
                $('#descripcion').val('')

                console.log(clon)
                $('#tabla_campos_form').append(clon)
            }
        });

        $('.eliminar-campo').click(function(){
            $(this).parent().parent().remove();
        })

        })
    </script>

@endsection