@extends('layouts.master')

@section('body')
    @section('navbar')
        @include('layouts.navbar')
    @show

    <div class="section">
        @yield('content')
    </div>

@endsection
