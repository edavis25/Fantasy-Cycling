@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title d-inline-block mt5">Manage Races</span>

                    <a href="{{ route('admin.races.create') }}" class="btn-floating waves-effect waves-light right green">
                        <i class="material-icons center-align">add</i>
                    </a>
                    <div class="clearfix"></div>

                    <div class="mt10">
                        <hr>
                        <table class="responsive-table" id="races">
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
                                    <td>
                                        <a href="{{ route('admin.races.show', $race) }}">{{ $race->name }}</a>
                                    </td>
                                    <td>{{ $race->year }}</td>
                                    <td>{{ $race->country }}</td>
                                    <td>{{ $race->number_stages }}</td>
                                    <td>{{ $race->start_date }}</td>
                                    <td>
                                        <a href="{{ route('admin.races.edit', $race) }}"><i class="material-icons">edit</i></a>
                                        <delete-confirm csrf-token="{{ csrf_token() }}" item-id="{{ $race->id }}" delete-route="{{ route('admin.races.destroy', $race) }}"></delete-confirm>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        var races = new Vue({
            el: '#races',
        });
    </script>
@endsection