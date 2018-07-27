@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.races.index') }}" class="waves-effect waves-light btn mt10 mb10">
        <i class="material-icons left ml-15">keyboard_arrow_left</i>back
    </a>

    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title d-inline-block mt5">{{ $race->name }} - {{ $race->year }} Dashboard</span>

                    <a href="{{ route('admin.races.edit', $race) }}" class="btn-floating waves-effect waves-light right amber darken-2">
                        <i class="material-icons center-align">edit</i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

