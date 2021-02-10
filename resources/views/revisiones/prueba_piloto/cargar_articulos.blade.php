@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mt-4 mb-4">Ejecucion del protocolo de busqueda</h2>

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Cadena de busqueda:</h5>
                    <p>{{$revision->cadena_de_busqueda}}</p>
                    <h5>Metadatos:</h5>
                    <ul class="list-group mb-4">
                        @foreach ($revision->metadatos as $metadato)
                            <li class="list-group-item">{{$metadato->nombre}}</li>
                        @endforeach
                    </ul>
                    <h5>Subconjunto de bibliotecas seleccionadas:</h5>
                    <ul class="list-group mb-2">
                        @foreach ($revision->prueba_piloto->bibliotecas as $biblioteca)
                            <li class="list-group-item">{{$biblioteca->nombre}}</li>
                        @endforeach
                    </ul>
                </div>
            </div> 
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Agregar un nuevo articulo</h5>
                    <form id="add-article-form" action="{{route("articulo.create", $revision)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="prueba_piloto_id" value="{{$revision->prueba_piloto_id}}">
                        <div class="form-row">
                            <div class="form-group col">
                            <input type="text" class="form-control" name='titulo' placeholder="Título">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                            <input type="text" class="form-control" name='extras[autores]' placeholder="Autores">
                            </div>
                            <div class="form-group col">
                            <input type="text" class="form-control" name="extras[otras_referencias]" placeholder="Resto de la referencia">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                            <select name="extras[biblioteca]" class="form-control" id="">
                                @foreach ($revision->prueba_piloto->bibliotecas as $biblioteca)
                                    <option value="{{$biblioteca->id}}">{{$biblioteca->nombre}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group col">
                                <input type="number" class="form-control" name="extras[año]" placeholder="Año" min="1900" max="2099" step="1" value="" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="custom-file">
                                    <input type="file" id="archivo" name="archivo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" name="archivo" for="customFile">Elegir archivo </label>
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-block btn-primary" type="submit">Agregar</button>
                    </form>
                </div>
            </div>



            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autores</th>
                    <th>Año</th>
                    <th>Resto de referencia</th>
                    <th>Biblioteca</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($revision->prueba_piloto->articulos as $articulo)
                        <tr>
                            <td>
                                {{ $articulo->extras['pid'] }}
                            </td>
                            <td>
                                {{ $articulo->titulo }}
                            </td>
                            <td>
                                {{ $articulo->extras['autores'] }}
                            </td>
                            <td>
                                {{ $articulo->extras['año'] }}
                            </td>
                            <td>
                                {{ $articulo->extras['otras_referencias'] }}
                            </td>

                            <td>
                                {{ $revision->bibliotecas->where('id','=',$articulo->extras['biblioteca'])->first()->nombre }}
                            </td>

                            <td>
                                <a href="" aria-label="editar" class="text-primary">
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
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href='{{route('revision.prueba_piloto.aplicar_criterios', $revision)}}' class="btn btn-primary btn-right float-right mb-4">Continuar</a>
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

        // $('#add-article-form').submit(function (e) {
        //     e.preventDefault();
        //     var form = $(this);
        //     console.log($('#archivo').val())
        //     $.ajax({
        //         type: "POST",
        //         enctype: 'multipart/form-data',
        //         processData: false,
        //         contentType: false,
        //         url: '{{ route("articulo.create", $revision) }}',
        //         data: new FormData( this ),
        //         success: function(data)
        //         {
        //             console.log(data);
        //         }
        //     });
        // })
        
    })
</script>
@endsection