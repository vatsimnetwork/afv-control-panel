<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Runway;
use Illuminate\Http\Request;

class RunwayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function index(Airport $airport)
    {
        $runways = $airport->runways(); // A.K.A. All
        return view('sections.runways.index', compact('airport', 'runways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function create(Airport $airport)
    {
        return view('sections.runways.create', compact('airport'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Airport  $airport
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Airport $airport, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @param  $runway
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport, $runway)
    {
        $runway = $airport->runways()->where('designator', $runway)->firstOrFail();

        return view('sections.runways.show', compact('airport', 'runway'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @param  \App\Models\Runway  $runway
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport, $runway)
    {
        $runway = $airport->runways()->where('designator', $runway)->firstOrFail();

        return view('sections.runways.edit', compact('airport', 'runway'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Airport  $airport
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Runway  $runway
     * @return \Illuminate\Http\Response
     */
    public function update(Airport $airport, Request $request, Runway $runway)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airport  $airport
     * @param  \App\Models\Runway  $runway
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport, Runway $runway)
    {
        //
    }
}
