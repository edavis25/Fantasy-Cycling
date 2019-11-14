@extends('layouts.master')

@section('body')

<div class="admin">
    <nav class="admin__sidebar">
        <h1 class="admin__sidebarHeader">Admin</h1>
        <ul>
            <li class="admin__sidebarLink --header">General</li>
            <li class="admin__sidebarLink">
                <a href="{{ route('admin.races.index') }}">Races</a>
            </li>
            <li class="admin__sidebarLink">
                <a href="{{ route('admin.teams.index') }}" class="white-text">Teams</a>
            </li>
            <li class="admin__sidebarLink">
                <a href="{{ route('admin.riders.index') }}" class="white-text">Riders</a>
            </li>
            <li class="admin__sidebarLink --header">Races</li>
            @foreach ($all_races as $race)
                <li class="admin__sidebarLink --race">
                    <a href="{{ route('admin.races.show', $race) }}">{{ $race->name }} - {{ $race->year }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="admin__content">
        {{-- FLASH MESSAGES --}}
        @if (Session::has('success'))
            <alert type="success" message="{{ Session::get('success') }}"></alert>
        @elseif (Session::has('warning'))
            <alert type="warning" message="{{ Session::get('warning') }}"></alert>
        @elseif (Session::has('info'))
            <alert type="info" message="{{ Session::get('info') }}"></alert>
        @elseif (Session::has('error'))
            <alert type="danger" message="{{ Session::get('error') }}"></alert>
        @endif

        {{-- MAIN ADMIN CONTENT --}}
        @yield('content')
    </div>
</div>
@endsection

