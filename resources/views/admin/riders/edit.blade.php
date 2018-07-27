@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.riders.index') }}" class="waves-effect waves-light btn mt10 mb10">
        <i class="material-icons left ml-15">keyboard_arrow_left</i>back
    </a>

    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">

                    @if (isset($rider) && $rider)
                        <div class="card-title">Edit Rider</div>
                        {!! Form::model($rider, ['route' => ['admin.riders.update', $rider], 'method' => 'PUT']) !!}
                    @else
                        <div class="card-title">Create New Rider</div>
                        {!! Form::open(['route' => ['admin.riders.store'], 'method' => 'POST']) !!}
                    @endif

                    <div class="mt25">
                        <div class="row">

                            <div class="input-field col s6">
                                {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="first_name">First Name</label>
                            </div>

                            <div class="input-field col s6">
                                {!! Form::text('last_name', null, ['id' => 'last_name', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="last_name">Last Name</label>
                            </div>

                            <div class="input-field col s12">
                                {!! Form::text('nationality', null, ['id' => 'country', 'class' => 'validate', 'required' => 'required']) !!}
                                <label for="nationality">Nationality</label>
                            </div>

                            <div class="input-field col s12">
                                {!! Form::text('birthdate', null, ['id' => 'birthdate', 'class' => 'validate datepicker', 'required' => 'required']) !!}
                                <label for="birthdate">Birthdate</label>
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
                format: 'yyyy-mm-dd',
                yearRange: 45,
            });

            $('.datepicker').on('focus', function() {
                $(this).click();
            });
        });
    </script>
@endsection