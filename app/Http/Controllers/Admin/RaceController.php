<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Race;
use App\Rider;
use App\RiderRole;
use App\Team;
use Illuminate\Http\Request;
use JavaScript;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = Race::all();
        return view('admin.races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.races.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Must create/save race separately for the slug mutator
        $race = new Race($request->all());
        $race->slug = $race->name;
        $race->save();

        return redirect(route('admin.races.index'))->with('success', $race->name . ' created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        $teams  = Team::orderBy('name')->get()->pluck('id', 'name');
        $riders = Rider::orderBy('last_name', 'first_name')->get()->pluck('name', 'id');
        $rider_roles = RiderRole::pluck('role', 'id');
        Javascript::put([
            'stages' => $race->stages,
            'race'   => $race,
            'teams'  => $teams,
            'riders' => $riders,
            'rider_roles' => $rider_roles
        ]);

        return view('admin.races.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        return view('admin.races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race                 $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
        $race->fill($request->all());
        $race->save();

        return redirect()->back()->with('success', $race->name . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        try {
            $race->delete();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Something went wrong: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', $race->name . ' deleted successfully!');
    }
}
