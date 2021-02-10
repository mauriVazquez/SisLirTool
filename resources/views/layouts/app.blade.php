<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    {{-- /<script src="{{ asset('js/dashboard.js') }}" defer></script> --}}
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <div class="container-fluid">
            <div class="row" style="margin: auto">
            @include('layouts.sidebar_content')
                <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            @yield('sidebar_content')
                        </ul>
                    </div>
                </nav>
                
                <main class="col-md-9 ml-sm-auto col-lg-9 mt-4 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @yield('sidebar_scripts')
    @yield('scripts')
</body>
</html>
