@extends('layouts.admin')

@section('content')

<div class="box">
    <h1 class="title is-2">Manage Teams</h1>
    <a class="button is-success is-rounded" href="{{ route('admin.teams.create') }}">
        Create Team&nbsp;<i class="fa fa-plus"></i>
    </a>
    <hr>
    <table class="table is-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Abbr.</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->abbreviation }}</td>
                <td>{{ $team->country }}</td>
                <td>
                    <a href="{{ route('admin.teams.edit', $team) }}"><i class="material-icons">edit</i></a>
                    <delete-confirm item-id="{{ $team->id }}" delete-route="{{ route('admin.teams.destroy', $team) }}"></delete-confirm>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
