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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- Materialize Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- App Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div id="app">
        @yield('body')
    </div>

    {{-- Ziggy Named Routes --}}
    @routes

    {{-- Compiled Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Additional Embedded Scripts --}}
    @yield('scripts')
</body>

</html>
