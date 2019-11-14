@extends('layouts.admin')

@section('content')

<a class="button is-link mb10" href="{{ route('admin.teams.index') }}">
    <i class="fa fa-chevron-left"></i>
</a>

<div class="box">
    <h1 class="title is-3">{{ isset($team) && $team ? $team->name : 'Create Team' }}</h1>
    <hr>

    @if (isset($team) && $team)
        {!! Form::model($team, ['route' => ['admin.teams.update', $team], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => ['admin.teams.store'], 'method' => 'POST']) !!}
    @endif

    <div class="column is-one-third-desktop">
        <div class="field">
            <label class="label" for="name">Name</label>
            <div class="control">
                {!! Form::text('name', null, ['id' => 'name', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label" for="abbreviation">Abbreviation</label>
            <div class="control">
                {!! Form::text('abbreviation', null, ['id' => 'abbreviation', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label" for="country">Country</label>
            <div class="control">
                {!! Form::text('country', null, ['id' => 'country', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <br>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-success">Submit</button>
            </div>
            <div class="control">
                <button class="button is-danger is-light">Cancel</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>

@endsection
