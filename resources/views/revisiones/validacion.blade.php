@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mt-4 mb-4">Validar el proyecto de revision - {{ $revision->titulo }}</h2>
            <form action="{{ route('validacion.store', $revision) }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 for="meta_necesidad_informacion"><b> Meta de necesidad de informacion</b></h4>
                        <div class="row align-items-center">
                            <div class="col-10">
                                <div class="form-group">
                                        <p>{{ $revision->meta_necesidad_informacion}}</p>
                                </div> 
                            </div>
                            <div class="col-auto align-items-center">
                                <div class="btn-group align-items-center" role="group" data-seccion='meta-informacion' aria-label="">
                                    <button type="button" class="btn btn-outline-success btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg></button>
                                    <button type="button" class="btn btn-outline-danger btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display: none" id="meta-informacion">
                            <label for="meta_necesidad_informacion"  class="font-weight-bold">Propuestas de mejora para la Meta de necesidad de información</label>
                            <textarea class="form-control" name='mejoras[meta-informacion]' id="meta_necesidad_informacion" disabled rows="3"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 for="preguntas"><b> Preguntas de investigacion</b></h4>
                        <div class="row align-items-center">
                            <div class="col-10">
                                <div class="form-group">
                                        <ul class="list-group mb-2">
                                            @foreach ($revision->preguntas as $pregunta)
                                            <li class="list-group-item">{{$pregunta->pregunta}}</li>
                                            @endforeach
                                        </ul>
                                    {{-- <textarea class="form-control" id="preguntas" rows="3"></textarea> --}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group align-items-center" role="group" data-seccion='preguntas' aria-label="">
                                    <button type="button" class="btn btn-outline-success btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                      </svg></button>
                                    <button type="button" class="btn btn-outline-danger btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                      </svg></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display: none" id="preguntas">
                            <label for="preguntas" class="font-weight-bold">Propuestas de mejora para las Preguntas de investigación</label>
                            <textarea class="form-control" name="mejoras[preguntas]" disabled id="preguntas" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 for="protocolo de busqueda"><b> Protocolo de busqueda</b></h4>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h5>Cadena de busqueda</h5>
                                    <ul><p>{{$revision->cadena_de_busqueda}}</p></ul>
                                    <h5>Metadatos</h5>
                                    <ul class="list-group mb-2">
                                        @foreach ($revision->metadatos as $metadato)
                                            <li class="list-group-item">{{$metadato->nombre}}</li>
                                        @endforeach
                                    </ul>
                                    <h5>Bibliotecas a utilizar</h5>
                                    <ul class="list-group mb-2">
                                        @foreach ($revision->bibliotecas as $biblioteca)
                                            <li class="list-group-item">{{$biblioteca->nombre}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <div class="btn-group align-items-center" role="group" data-seccion="protocolo" aria-label="">
                                        <button type="button" class="btn btn-outline-success btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg></button>
                                        <button type="button" class="btn btn-outline-danger btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg></button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group" style="display: none" id="protocolo">
                            <label for="protocolo" class="font-weight-bold">Propuestas de mejora para el Protocolo de busqueda</label>
                            <textarea class="form-control" id="protocolo" name="mejoras[protocolo]" disabled rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 for="preguntas"><b> Criterios: </b></h4>
                                <h5>Criterios de selección:</h5>
                                <div class="row align-items-center">
                                    <div class="col-10">
                                        <ul>
                                            <li>
                                                Criterios de incluisión 
                                                <ul class="list-group">
                                                    @foreach ($revision->criterios->where('tipo', 'inclusion') as $criterio)
                                                    <li class="list-group-item">{{$criterio->descripcion}}</li>
                                                    @endforeach
                                                </ul> 
                                            </li> 
                                            <li>
                                                Criterios de exclusión 
                                                <ul class="list-group">
                                                    @foreach ($revision->criterios->where('tipo', 'exclusion') as $criterio)
                                                    <li class="list-group-item">{{$criterio->descripcion}}</li>
                                                @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                        <h5>criterios de calidad:</h5>
                                        <ul class="list-group">
                                            @foreach ($revision->criterios->where('tipo', 'calidad') as $criterio)
                                                <li class="list-group-item">{{$criterio->descripcion}}</li>
                                            @endforeach
                                        </ul> 
                                    </div>
                                    <div class="col-auto">
                                        <div class="btn-group align-items-center" role="group" data-seccion="criterios" aria-label="">
                                            <button type="button" class="btn btn-outline-success btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                              </svg></button>
                                            <button type="button" class="btn btn-outline-danger btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg></button>
                                        </div>
                                    </div>
                                </div>   
                        </div>
                        <div class="form-group" style="display: none" id='criterios'>
                            <label for="criterios" class="font-weight-bold">Propuestas de mejora para los criterios</label>
                            <textarea class="form-control" disabled name="mejoras[criterios]" id="criterios" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 for="protocolo de busqueda"><b>Formulario de extracción de datos</b></h4>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <table class="table" id="tabla_campos_form">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Campos</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tabla_campos_form">
                                            @foreach (json_decode($revision->formulario_extraccion) as $campo)
                                            <tr>
                                                <td><input type="text" class="form-control-plaintext texto" readonly style="outline: 0px" name="campos[]" value="{{ $campo }}" id=""></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                </div>
                                <div class="col-auto">
                                    <div class="btn-group align-items-center" role="group" data-seccion="formulario" aria-label="">
                                        <button type="button" class="btn btn-outline-success btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg></button>
                                        <button type="button" class="btn btn-outline-danger btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg></button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group" style="display: none" id="formulario">
                            <label for="formulario" class="font-weight-bold">Propuestas de mejora para el Formulario de extracción</label>
                            <textarea class="form-control" id="formulario" name="mejoras[formulario]" disabled rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-success"> Crear </button>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.btn-outline-success').on('click',function () {
            parent = $(this).parent()
            parent.find('.btn').removeClass('active')

            $('#'+parent.data('seccion')).find('.form-control').attr('disabled',true)
            $('#'+parent.data('seccion')).hide()
            console.log(parent.data('seccion'))

           $(this).addClass('active');
        })
        $('.btn-outline-danger').on('click',function () {
            parent = $(this).parent()
            parent.find('.btn').removeClass('active')

            $('#'+parent.data('seccion')).find('.form-control').attr('disabled',false)
            $('#'+parent.data('seccion')).show()

            $(this).addClass('active');
            
        })
    })
</script>
@endsection
