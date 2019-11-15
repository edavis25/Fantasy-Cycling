@extends('layouts.admin')

@section('content')

<div class="box">
    <h1 class="title is-2">Manage Riders</h1>
    <a href="{{ route('admin.riders.create') }}" class="button is-success is-rounded">
        Create Rider <i class="fa fa-plus"></i>
    </a>
    <hr>
    <table class="table is-striped is-fullwidth">
        <thead>
        <tr>
            <th>Name</th>
            <th>Nationality</th>
            <th>Birthdate</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($riders as $rider)
            <tr>
                <td>{{ $rider->getFullName() }}</td>
                <td>{{ $rider->nationality }}</td>
                <td>{{ $rider->birthdate }}</td>
                <td>
                    <a href="{{ route('admin.riders.edit', $rider) }}"><i class="material-icons">edit</i></a>
                    <delete-confirm item-id="{{ $rider->id }}" delete-route="{{ route('admin.riders.destroy', $rider) }}"></delete-confirm>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
