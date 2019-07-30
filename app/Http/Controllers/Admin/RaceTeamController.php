<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Race;
use App\RaceTeam;
use App\Team;
use Illuminate\Http\Request;

class RaceTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Race $race)
    {
        $teams = $race->teams->load('team');

        return response()->json(['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race                 $race
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Race $race)
    {
        $team = Team::findOrFail($request->input('team_id'));
        $race_team = RaceTeam::firstOrCreate([
            'race_id' => $race->id,
            'team_id' => $team->id
        ]);
        //$race->teams()->syncWithoutDetaching($team->id);

        return response()->json(['team' => $race_team->load('team')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($race_id, $id)
    {
        $race_team = RaceTeam::findOrFail($id);
        $race_team->delete();

        return response()->json(['success', 'Team removed']);
    }
}
