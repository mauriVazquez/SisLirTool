
@section('sidebar_content')   
  <li class="nav-item">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center">
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
              Revisiones
            </a>
      </h6>
          <ul class="list-group list-group-flush">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Revision ejemplo 1
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="file"></span>
                Revision ejemplo 2
              </a>
            </li>
          </ul>
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