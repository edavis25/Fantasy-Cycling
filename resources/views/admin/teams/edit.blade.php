@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.teams.index') }}" class="waves-effect waves-light btn mt10 mb10">
        <i class="material-icons left ml-15">keyboard_arrow_left</i>back
    </a>

    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    @if (isset($team) && $team)
                        <div class="card-title">Edit Team</div>
                        {!! Form::model($team, ['route' => ['admin.teams.update', $team], 'method' => 'PUT']) !!}
                    @else
                        <div class="card-title">Create New Team</div>
                        {!! Form::open(['route' => ['admin.teams.store'], 'method' => 'POST']) !!}
                    @endif
                    <div class="mt25">
                        <div class="row">

                            <div class="input-field col s12">
                                {!! Form::text('name', null, ['id' => 'name', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="name">Name</label>
                            </div>

                            <div class="input-field col m6">
                                {!! Form::text('abbreviation', null, ['id' => 'country', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="abbreviation">Abbreviation</label>
                            </div>

                            <div class="input-field col m6">
                                {!! Form::text('country', null, ['id' => 'country', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="country">Country</label>
                            </div>

                        </div>
                    </div>
                    <div class="card-action pl0 pr0">
                        <button class="btn waves-effect waves-light green" type="submit" name="action">
                            Save
                            <i class="material-icons right">send</i>
                        </button>
                        <button class="btn waves-effect waves-light red" type="reset">
                            Reset
                            <i class="material-icons right">settings_backup_restore</i>
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
