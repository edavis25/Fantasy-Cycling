@extends('layouts.admin')

@section('content')

<div class="box">
    <h1 class="title is-2">Manage Races</h1>
    <a class="button is-success is-rounded" href="{{ route('admin.races.create') }}">Create Race&nbsp;<i class="fa fa-plus"></i></a>
    <hr>
    <table class="table is-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Year</th>
                <th>Country</th>
                <th># Stages</th>
                <th>Start Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($races as $race)
            <tr>
                <td><a href="{{ route('admin.races.show', $race) }}">{{ $race->name }}</a></td>
                <td>{{ $race->year }}</td>
                <td>{{ $race->country }}</td>
                <td>{{ $race->number_stages }}</td>
                <td>{{ $race->start_date }}</td>
                <td>
                    <a href="{{ route('admin.races.edit', $race) }}"><i class="material-icons">edit</i></a>
                    <delete-confirm item-id="{{ $race->id }}" delete-route="{{ route('admin.races.destroy', $race) }}"></delete-confirm>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
