@extends('layouts.master')

@section('body')
    @section('navbar')
        @include('layouts.navbar')
    @show

    {{-- Show flash data --}}
    <div class="container admin-content" id="app">
        <div class="row">
            <div class="col s12" id="alerts">
                @if (Session::has('success'))
                    <alert type="success" message="{{ Session::get('success') }}"></alert>
                @elseif (Session::has('warning'))
                    <alert type="warning" message="{{ Session::get('warning') }}"></alert>
                @elseif (Session::has('info'))
                    <alert type="info" message="{{ Session::get('info') }}"></alert>
                @elseif (Session::has('error'))
                    <alert type="danger" message="{{ Session::get('error') }}"></alert>
                @endif
            </div>
        </div>
        @yield('content')
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        var alerts = new Vue({
            el: '#alerts',
        })
    </script>
@endsection