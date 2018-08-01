@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title d-inline-block mt5">Manage Teams</span>

                    <a href="{{ route('admin.teams.create') }}" class="btn-floating waves-effect waves-light right green">
                        <i class="material-icons center-align">add</i>
                    </a>
                    <div class="clearfix"></div>

                    <div class="mt10">
                        <hr>
                        <table class="responsive-table" id="teams">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Abbr.</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->abbreviation }}</td>
                                    <td>{{ $team->country }}</td>
                                    <td>
                                        <a href="{{ route('admin.teams.edit', $team) }}"><i class="material-icons">edit</i></a>
                                        <delete-confirm item-id="{{ $team->id }}" delete-route="{{ route('admin.teams.destroy', $team) }}"></delete-confirm>
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
        var teams = new Vue({
            el: '#teams',
        });
    </script>
@endsection