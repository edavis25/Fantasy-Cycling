@extends('layouts.master')

@section('body')
    @section('navbar')
        @include('layouts.navbar')
    @show


    <div class="container" id="app">
        @yield('content')
    </div>
@endsection