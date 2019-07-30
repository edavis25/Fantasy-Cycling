<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Race;
use App\RaceRider;
use Illuminate\Http\Request;

class RaceRiderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Race $race)
    {
        $rider = RaceRider::firstOrNew(['rider_id' => $request->riderId]);
        $rider->cost = $request->cost;
        $rider->race_team_id = $request->teamId;
        $rider->role_id = $request->roleId;
        $race->raceRiders()->save($rider);

        return response()->json(['rider' => $rider->load('rider')]);
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
     * @param  Race $race
     * @param  RaceRider $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race, RaceRider $rider)
    {
        $rider->delete();
        return response()->json(['success' => 'Rider removed']);
    }
}
