<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StageRequest;
use App\Race;
use App\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Race $race)
    {
        dd($race);
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
     * @param  \App\Http\Requests\StageRequest  $request
     * @param  \App\Race                        $race
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request, Race $race)
    {
        try {
            $stage = new Stage();
            $stage->fill($request->all());
            $stage->race()->associate($race);
            $stage->save();

            return response()->json($stage);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
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
     * @param  \App\Http\Requests\StageRequest  $request
     * @param  \App\Race                        $race
     * @param  \App\Stage                       $stage
     * @return  \Illuminate\Http\Response
     */
    public function update(StageRequest $request, Race $race, Stage $stage)
    {
        $stage->fill($request->all());
        $stage->save();

        return response()->json(['stage' => $stage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race   $race
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race, Stage $stage)
    {
        try {
            $stage->delete();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Something went wrong: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', $stage->name . ' deleted successfully!');
    }
}
