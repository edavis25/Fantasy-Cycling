@extends('layouts.admin')

@section('content')

<a class="button is-primary is-link mb10" href="{{ route('admin.races.index') }}">
    <i class="material-icons">keyboard_arrow_left</i>
</a>

<div class="box">
    <h1 class="title is-2">{{ isset($race) && $race ? 'Edit' : 'Create' }} Race</h1>
    <hr>

    {{-- Open either an edit or store form depending if a $race was passed in (so we can re-use) --}}
    @if (isset($race) && $race)
        {!! Form::model($race, ['route' => ['admin.races.update', $race], 'method' => 'PUT', 'class' => 'columns']) !!}
    @else
        {!! Form::open(['route' => ['admin.races.store'], 'method' => 'POST', 'class' => 'columns']) !!}
    @endif

    <div class="column is-one-third-desktop">
        <div class="field">
            <label class="label">Race Name</label>
            <div class="control">
                {!! Form::text('name', null, ['id' => 'name', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label">Country</label>
            <div class="control">
                {!! Form::text('country', null, ['id' => 'country', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label">Year</label>
            <div class="control">
                {!! Form::number('year', null, ['id' => 'year', 'class' => 'input', 'required' => 'required', 'min' => '2015']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label">Number Stages</label>
            <div class="control">
                {!! Form::number('number_stages', null, ['id' => 'number_stages', 'class' => 'input', 'required' => 'required', 'min' => '1']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label">Start Date</label>
            <div class="control">
                {!! Form::date('start_date', null, ['id' => 'start_date', 'class' => 'input', 'required' => 'required']) !!}
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
