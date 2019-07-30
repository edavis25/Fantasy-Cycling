<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">

    <title>
        @section('title')
            {{ env('APP_NAME') ?? 'Fantasy Cycling' }}
        @show
    </title>

    {{-- Font Awesome 5.2.0 --}}
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">--}}

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Materialize Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    @yield('body')
    {{-- Navbar --}}
    {{--
    @section('navbar')
        @include('layouts.navbar')
    @show


    <div class="container" id="app">
        @yield('content')
    </div>
    --}}

    {{-- Ziggy Named Routes --}}
    @routes

    {{-- Compiled Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

    {{-- Global Scripts --}}
    <script>
        $(document).ready(function(){
            // Initialize Materialize.css Components
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();
            $('select').formSelect();

            /** @note this initializes all the materialize Javascript components... this feature was added to the framework
             * after I started using it, so we can probably investigate removing all of the individual initializations above*/
            //M.AutoInit();
        });
    </script>

    @yield('scripts')
</body>

</html>
