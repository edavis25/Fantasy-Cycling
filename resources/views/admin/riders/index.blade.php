@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title d-inline-block mt5">Manage Riders</span>

                    <a href="{{ route('admin.riders.create') }}" class="btn-floating waves-effect waves-light right green">
                        <i class="material-icons center-align">add</i>
                    </a>
                    <div class="clearfix"></div>

                    <div class="mt10">
                        <hr>
                        <table class="responsive-table" id="riders">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        var riders = new Vue({
            el: '#riders',
        });
    </script>
@endsection