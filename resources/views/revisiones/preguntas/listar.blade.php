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
                </div>
            </div>

            <form action="{{ route('preguntas.store', $revision)}}" method="post">
                @csrf
                <h4>Preguntas de investigacion</h4>
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
                    <li class="alert-dismissible clonable" style="display: none;">
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

                <button type="submit" class="btn btn-block btn-success"> Siguiente </button>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    
    <script  type="text/javascript">
        $(function() {

      
            $('#addPregunta').click(function (event){
            
            if($('#pregunta').val().length > 2){
            clon = $('.clonable').clone(true).show().removeClass('clonable').addClass('list-group-item')
            
            $(clon).find('.texto').attr('name','preguntas[]')
            $(clon).find('.texto').val($('#pregunta').val())
            $('#pregunta').val('')
            $("#listPregunta").append(clon);
            }
            })
            $('.borrar-pregunta').click(function(){
                $(this).parent().remove();
            })
        })

    </script>

@endsection