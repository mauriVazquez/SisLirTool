
@section('sidebar_content')   
  <li class="nav-item">
    @auth
      <h6 class="d-flex align-items-center">
        <a class="nav-link" href="#">
          Revisiones Sistematicas de Literatura
        </a>
        <a class="text-success" href="{{ route('revisiones.create')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
        </a>
    </h6>
      <ul class="list-group list-group-flush">
        @foreach (Auth::user()->revisiones as $revision)
        <li class="nav-item"> 
          <button type="button" class=" btn btn-link btn-block opciones-revision text-left" id='{{$revision->id}}' >
            <span data-feather="file"></span>
            {{$revision->titulo}}
          </button>
          <ul id='revision-list-{{$revision->id}}' class="revision-list" style="list-style-type: none; display:none">
            <li class="nav-item"> <a class="nav-link"  href="{{route('revision.preguntas', $revision)}}" >Preguntas</a></li>
            <li class="nav-item"> <a class="nav-link"  href="{{route('revision.protocoloBusqueda', $revision)}}" >Protocolo de busqueda</a></li>
            <li class="nav-item"> <a class="nav-link"  href="{{route('revision.criterios', $revision)}}"  >Definir Criterios</a></li>
            <li class="nav-item"> <a class="nav-link"  href="{{route('revision.formulario_extraccion', $revision)}}" >Diseñar formulario de extraccion</a></li>   
            <li class="nav-item"> <a class="nav-link"  href="{{route('revision.validacion', $revision)}}" >Validacion</a></li>   
          </ul>
         
        </li>
        @endforeach
      </ul>
    @endauth
      
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>AYUDA</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Diseñar Revisión
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Ejecutar Revisión
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Analizar y Documentar Revisión
            </a>
          </li>
        </ul>
@endsection

@section('sidebar_scripts')
    <script>
      $(function () {
        $('.opciones-revision').on('click', function (e) {

            $('.revision-list').hide();
            $(this).addClass('active');
            $('#revision-list-'+$(this).attr('id')).show();
        })
      })
    </script>
@endsection