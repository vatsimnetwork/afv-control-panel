<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::orderBy('icao'); // A.K.A. All
        return view('sections.airports.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.airports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'icao' => 'required|alpha_num|min:3|max:4|unique:airports',
            'name' => 'required|string|max:255',
        ]);

        $airport = Airport::create([
            'icao' => strtoupper($request->input('icao')),
            'name' => $request->input('name'),
        ]);

        return redirect()->route('airports.show', ['airport' => $airport])->withSuccess(['Success', 'Airport created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        return view('sections.airports.show', compact('airport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        return view('sections.airports.edit', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {
        $request->validate([
            'icao' => [
                'required',
                'alpha_num',
                'min:3',
                'max:4',
                Rule::unique('airports')->ignore($airport),
            ],
            'name' => 'required|string|max:255',
        ]);

        $airport->icao = strtoupper($request->input('icao'));
        $airport->name = $request->input('name');
        $airport->save();

        return redirect()->route('airports.show', ['airport' => $airport])->withSuccess(['Success', 'Airport updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        $airport->delete();

        return redirect()->route('airports.index')->withSuccess(['Success', 'Airport deleted']);
    }
}
