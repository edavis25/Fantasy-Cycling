@extends('layouts.admin')

@section('content')

<a class="button is-primary is-link mb10" href="{{ route('admin.index') }}">
    <i class="fa fa-chevron-left"></i>
</a>
<div class="box">
    <h1 class="title is-2">{{ $race->name }}</h1>
    <hr>
    <stages-card :stages="{{ $race->stages }}" :race="{{ $race }}" can-edit="true"></stages-card>

</div>



{{--    <button class="button">Button</button>--}}
{{--    <a href="{{ route('admin.races.index') }}" class="waves-effect waves-light btn mt10 mb10">--}}
{{--        <i class="material-icons left ml-15">keyboard_arrow_left</i>back--}}
{{--    </a>--}}
{{--    <div class="race-dashboard">--}}
{{--        <div class="row">--}}
{{--            <h4 class="ml10 d-inline-block">{{ $race->name }} - {{ $race->year }} Dashboard</h4>--}}
{{--            <a href="{{ route('admin.races.edit', $race) }}" class="btn-floating waves-effect waves-light right amber darken-2 mt15">--}}
{{--            <a href="{{ route('admin.races.edit', $race) }}" class="btn-floating waves-effect waves-light right amber darken-2 mt15">--}}
{{--                <i class="material-icons center-align">edit</i>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col m12">--}}
{{--                <stages-card :stages="stages" :race="race" can-edit="true"></stages-card>--}}

{{--                <race-team-card--}}
{{--                    :available-teams="teams"--}}
{{--                    :race-id="race.id"--}}
{{--                    :riders="riders"--}}
{{--                    :rider-roles="riderRoles"--}}
{{--                ></race-team-card>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('scripts')
    @parent

    <script>

        var raceDashboard = new Vue({
            el: '.race-dashboard',
            data: {
                race: App.race,
                stages: App.stages,
                teams: App.teams,
                riders: App.riders,
                riderRoles: App.rider_roles,
                canEdit: true
            },
            mounted: function() {
                // this.$nextTick(() => {
                //     $('select').formSelect();
                //     $('.tabs').tabs();
                // });

                // document.addEventListener('DOMContentLoaded', function() {
                //     var elems = document.querySelectorAll('select');
                //     var instances = M.FormSelect.init(elems, {});
                // });
            }
        });
    </script>

@endsection
