@extends('layouts.admin')

@section('content')
    <a href="{{ URL::previous() }}" class="waves-effect waves-light btn mt10 mb10">
        <i class="material-icons left ml-15">keyboard_arrow_left</i>back
    </a>

    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    @if (isset($race) && $race)
                        <div class="card-title">Edit Race</div>
                        {!! Form::model($race, ['route' => ['admin.races.update', $race], 'method' => 'PUT']) !!}
                    @else
                        <div class="card-title">Create New Race</div>
                        {!! Form::open(['route' => ['admin.races.store'], 'method' => 'POST']) !!}
                    @endif
                    <div class="mt25">
                        <div class="row">
                            <div class="input-field col s12">
                                {!! Form::text('name', null, ['id' => 'name', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="name">Name</label>
                            </div>

                            <div class="input-field col m6">
                                {!! Form::text('country', null, ['id' => 'country', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="country">Country</label>
                            </div>

                            <div class="input-field col m6">
                                {!! Form::number('year', null, ['id' => 'year', 'class' => 'validate', 'required' => 'required', 'min' => '2015']) !!}
                                <label for="year">Year</label>
                            </div>

                            <div class="input-field col m6">
                                {!! Form::number('number_stages', null, ['id' => 'year', 'class' => 'validate', 'required' => 'required', 'min' => '1']) !!}
                                <label for="number_stages">Number Stages</label>
                            </div>

                            <div class="input-field col m6">
                                {!! Form::text('start_date', null, ['id' => 'start_date', 'class' => 'validate datepicker', 'required' => 'required']) !!}
                                <label for="start_date">Start Date</label>
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

@section('scripts')
    @parent
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            $('.datepicker').on('focus', function() {
                $(this).click();
            });
        });
    </script>
@endsection