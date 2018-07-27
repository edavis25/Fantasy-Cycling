<nav>
    <div class="nav-wrapper bg-grey">
        <a href="#!" class="brand-logo pl30 hide-on-med-and-up">Admin</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div id="slide-out" class="sidenav bg-grey">
    <h4 class="hide-on-small-and-down sidenav-heading white-text ml30">Admin</h4>
    <div class="divider white" style="margin-top: -2px;"></div>
    <ul class="mt0">
        <li>
            <ul class="collapsible">
                <li class="active">
                    <div class="collapsible-header pl30 d-block bg-grey-light yellow-text text-darken-2">
                        GENERAL
                        <i class="material-icons right">arrow_drop_down</i>
                    </div>
                    <div class="collapsible-body">
                        <ul class="bg-grey-light">
                            <li><a href="{{ route('admin.races.index') }}" class="white-text">Races</a></li>
                            <li><div class="divider bg-grey-dark mt0 mb0"></div></li>
                            <li><a href="{{ route('admin.teams.index') }}" class="white-text">Teams</a></li>
                            <li><div class="divider bg-grey-dark mt0 mb0"></div></li>
                            <li><a href="{{ route('admin.riders.index') }}" class="white-text">Riders</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li> {{-- /End general collapse panel --}}

        <li><div class="divider bg-grey-light mt0 mb0"></div></li>

        <li>
            <ul class="collapsible">
                <li class="active">
                    <div class="collapsible-header pl30 d-block bg-grey-light yellow-text text-darken-2">
                        RACES
                        <i class="material-icons right">arrow_drop_down</i>
                    </div>
                    <div class="collapsible-body">
                        <ul class="bg-grey-light">
                            @foreach ($all_races as $race)
                                <li><a href="{{ route('admin.races.show', $race) }}" class="white-text">{{ $race->name }} - {{ $race->year }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
