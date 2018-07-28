@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.races.index') }}" class="waves-effect waves-light btn mt10 mb10">
        <i class="material-icons left ml-15">keyboard_arrow_left</i>back
    </a>

    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <span class="card-title d-inline-block mt5">{{ $race->name }} - {{ $race->year }} Dashboard</span>

                        <a href="{{ route('admin.races.edit', $race) }}" class="btn-floating waves-effect waves-light right amber darken-2">
                            <i class="material-icons center-align">edit</i>
                        </a>

                        <div class="clearfix"></div>
                    </div>

                    <div class="row mt40">
                        <div class="card stages">
                            <div class="card-content">
                                <a class="btn-floating right waves-effect waves-light green" @click="showCreateStage"><i class="material-icons">add</i></a>
                                <span class="card-title">Stages</span>

                            </div>
                            <div class="card-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Number</td>
                                            <td>Start</td>
                                            <td>End</td>
                                            <td>Distance</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-show="creatingStage">
                                            <td>
                                                <input type="number" name="stage_number">
                                            </td>
                                            <td>
                                                <input type="text" name="start_location">
                                            </td>
                                            <td>
                                                <input type="text" name="end_location">
                                            </td>
                                            <td>
                                                <input type="number" name="distance">
                                            </td>
                                            <td>
                                                <i class="material-icons" @click="createStage()">save</i>
                                            </td>
                                        </tr>
                                        <tr v-for="stage in stages">
                                            <td>@{{ stage.stage_number }}</td>
                                            <td>@{{ stage.start_location }}</td>
                                            <td>@{{ stage.end_location }}</td>
                                            <td>@{{ stage.distance }}</td>
                                            <td>ACTIONS</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });

        var races = new Vue({
            el: '.stages',
            data: {
                stages: App.stages,
                creatingStage: false,
            },
            methods: {
                showCreateStage: function() {
                    this.creatingStage = !this.creatingStage;
                },
                createStage: function() {
                    let data = {

                    };
                    axios.post('{{ route('admin.race.stages.store', [$race]) }}', data)
                        .then((response) => {
                            console.log(response.data);
                        })
                        .catch((error) => {

                        })
                }
            }
        });
    </script>

@endsection



