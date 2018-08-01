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

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Materialize Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        });
    </script>

    @yield('scripts')
</body>

</html>