@extends('layouts.admin')

@section('content')

<a class="button is-primary is-link mb10" href="{{ route('admin.races.index') }}">
    <i class="fa fa-chevron-left"></i>
</a>

<div class="box">
    <h1 class="title is-3 is-link mb10">{{ isset($rider) && $rider ? $rider->name : 'Create Rider' }}</h1>
    <hr>

    {{-- Open either an edit or store form depending if a $race was passed in (so we can re-use) --}}
    @if (isset($rider) && $rider)
        {!! Form::model($rider, ['route' => ['admin.riders.update', $rider], 'method' => 'PUT', 'class' => 'columns']) !!}
    @else
        {!! Form::open(['route' => ['admin.riders.store'], 'method' => 'POST', 'class' => 'columns']) !!}
    @endif

    <div class="column is-one-third-desktop">
        <div class="field">
            <label class="label" for="first_name">First Name</label>
            <div class="control">
                {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label" for="last_name">Last Name</label>
            <div class="control">
                {!! Form::text('last_name', null, ['id' => 'last_name', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label" for="country">Country</label>
            <div class="control">
                {!! Form::text('nationality', null, ['id' => 'country', 'class' => 'input', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label" for="birthdate">Date of Birth</label>
            <div class="control">
                {!! Form::date('birthdate', null, ['id' => 'birthdate', 'class' => 'input', 'required' => 'required']) !!}
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

</div>

@endsection
