@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mt-4 mb-4">Aplicar criterios de selección</h2>

            <table class="table">
                <thead class="thead-dark">
                    <th>#</th>
                    <th>Título</th>
                    <th>Autores</th>
                    <th>Año</th>
                    <th>Resto de referencia</th>
                    <th>Biblioteca</th>
                    <th>resultado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($revision->prueba_piloto->articulos as $articulo)
                        <tr id='articulo-{{$articulo->id}}-row'>
                            <td class="align-middle">
                                {{ $articulo->extras['pid'] }}
                            </td>
                            <td class="align-middle">
                                {{ $articulo->titulo }}
                            </td>
                            <td class="align-middle">
                                {{ $articulo->extras['autores'] }}
                            </td>
                            <td class="align-middle">
                                {{ $articulo->extras['año'] }}
                            </td>
                            <td class="align-middle">
                                {{ $articulo->extras['otras_referencias'] }}
                            </td>

                            <td class="align-middle">
                                {{ $revision->bibliotecas->where('id','=',$articulo->extras['biblioteca'])->first()->nombre }}
                            </td >
                            <td class="align-middle">
                                @if($articulo->evaluaciones->count() > 0)
                                    @if($articulo->aceptado)
                                    <div class="text-center " >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="22" height="22" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                        </svg>
                                    </div>

                                    @else
                                    <div class="text-center " >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="22" height="22" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </div>
                                    @endif
                                @endif
                            </td>
                            <td class="align-middle">
                                {{-- <a href="" aria-label="editar" class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg>
                                </a>
    
                                <a href="" aria-label="eliminar" class="text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg>
                                </a> --}}

                                <button class="btn btn-primary evaluar-articulo" data-url='{{route('articulo.show',$articulo->id)}}' data-articulo='{{$articulo->id}}'>Evaluar</button>
                                <a class="btn btn-link " target="_blank" href='{{asset($articulo->archivo)}}' data-articulo='{{$articulo->id}}'>ver</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form id="form-evaluacion" action="">
                @csrf
                <input type="hidden" id='articulo_id' name="articulo_id">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="text-center">Criterios aplicables</h4>

                            <p class="text-center"><b>Articulo a evaluar:</b> <span id="titulo-articulo-Evaluado"></span></p>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col">
                                        <input readonly type="text" class="form-control" id='autores' placeholder="">
                                        </div>
                                        <div class="form-group col">
                                        <input readonly type="text" class="form-control" id="resto_referencia" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                        <input type="text" readonly name="" class="form-control" id="biblioteca">
                                        </select>
                                        </div>
                                        <div class="form-group col">
                                            <input type="text" readonly class="form-control" id="ano" placeholder="" />
                                        </div>
                                    </div>

                                    <a class="btn btn-block btn-primary">Abrir Articulo</a>
                                </div>
                            </div>
                        <div class="container mb-4">
                            <h5>Criterios de Inclusión</h5>
                            <ul class="list-group mb-2" id="IN">
        
                                @isset($revision->criterios)
                                    @foreach ($revision->criterios->where('tipo','inclusion') as $criterio)
    
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <li class="list-group-item alert-dismissible">
                                                <input type="text" class="form-control-plaintext texto" name="" style="outline: 0px"
                                                    value="{{ $criterio->descripcion }}">
                                            </li>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-success btn-lg">
                                                <input type="radio" name="criterios[{{$criterio->id}}]" id="inclusion-accept-{{$criterio->id}}" value="aceptado" > 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                                </svg>
                                                </label>
                                                <label class="btn btn-outline-danger btn-lg">
                                                <input type="radio" name="criterios[{{$criterio->id}}]" id="inclusion-reject-{{$criterio->id}}" value="rechazado" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16" >
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                @endisset
        
                            </ul>
                            <h5>Criterios de Exclusión</h5>
                            <ul class="list-group mb-2" id="EX">
                                @isset($revision->criterios)
                                    @foreach ($revision->criterios->where('tipo','exclusion') as $criterio)
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <li class="list-group-item alert-dismissible">
                                                <input type="text" class="form-control-plaintext texto" name="" style="outline: 0px"
                                                    value="{{ $criterio->descripcion }}">
                                            </li>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-success btn-lg">
                                                <input type="radio" name="criterios[{{$criterio->id}}]" id="inclusion-accept-{{$criterio->id}}" value="aceptado" > 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                                </svg>
                                                </label>
                                                <label class="btn btn-outline-danger btn-lg">
                                                <input type="radio" name="criterios[{{$criterio->id}}]" id="inclusion-reject-{{$criterio->id}}" value="rechazado" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </ul>
                            
                        </div>
                        <button class="btn btn-success btn-right float-right mb-4" type="submit" id='enviar-evaluacion'>Enviar evaluación</button>
                    </div>
                </div>
            </form>
           
            <button  class="btn btn-primary btn-right float-right mb-4">Continuar</button>
            <div style="height: 40px;"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {

        $('.custom-file-input').on('change', function() { 
            let fileName = $(this).val().split('\\').pop(); 
            $(this).next('.custom-file-label').addClass("selected").html(fileName); 
        });

        $(function () {
            $('.btn-outline-success').on('click',function () {
                parent = $(this).parent()
                parent.find('.btn').removeClass('active')

            $(this).addClass('active');
            })
            $('.btn-outline-danger').on('click',function () {
                parent = $(this).parent()
                parent.find('.btn').removeClass('active')

                $(this).addClass('active');
                
            })
        })

        $('.evaluar-articulo').on('click', function () {
            
            articulo = $(this).data('articulo');

            console.log(articulo)


            $.ajax({
                type: "GET",
                url: $(this).data('url'),
                dataType: "json",
                success: function(data)
                {
                    console.log(data);

                    $('#titulo-articulo-Evaluado').text(data.titulo).articulo


                    $('#articulo_id').val(data.id);
                    $('#biblioteca').val(data.biblioteca_nombre);
                    $('#autores').val(data.extras.autores);
                    $('#ano').val(data.extras.año);
                    $('#resto_referencia').val(data.extras.otras_referencias);
                    $('#info-span-id').text(data.extras.id);


                    $('#articulo-info').show();


                }
            });
        })

        $('#form-evaluacion').submit(function (e) {
            
            e.preventDefault(); 

            var form = $(this);

            $.ajax({
                type: "post",
                url: '{{ route("evaluaciones.store")}}',
                data: form.serialize(),
                success: function(data)
                {
                    console.log(data);

                    $('#articulo-'+data.id+'-row').find('resultado')
                }
            });
        })
        
    })
</script>
@endsection