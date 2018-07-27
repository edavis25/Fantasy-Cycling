<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rider;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riders = Rider::all();

        return view('admin.riders.index', compact('riders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.riders.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rider = Rider::create($request->all());

        return redirect(route('admin.riders.index'))->with('success', $rider->getFullName() . ' created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit(Rider $rider)
    {
        return view('admin.riders.edit', compact('rider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rider $rider)
    {
        $rider->fill($request->all());
        $rider->save();

        return redirect(route('admin.riders.index'))->with('success', $rider->getFullName() . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {
        try {
            $rider->delete();
        }
        catch (\Exception $e) {
            return redirect(route('admin.riders.index'))->with('error', 'Oops! Something went wrong: ' . $e->getMessage());
        }

        return redirect(route('admin.riders.index'))->with('success', $rider->getFullName() . ' deleted successfully!');

    }
}
