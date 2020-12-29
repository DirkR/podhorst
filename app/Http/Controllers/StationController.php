<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{

    public function index()
    {
        $stations = Station::all();
        return view("station.list", compact('stations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show(Station $station)
    {
        return view("station.show", compact('station'));
    }

    public function edit(Station $station)
    {
        return view("station.edit", compact('station'));
    }

    public function update(Request $request, Station $station)
    {
        $station->label = $request->input('label');
        $station->description = $request->input('description');
        $station->slug = $request->input('slug');

        if ($url = $request->input('homepage_url')) {
            $station->homepage_url = $url;
        }

        if ($url = $request->input('stream_url')) {
            $station->stream_url = $url;
        }

        if ($url = $request->input('icon_url')) {
            $station->icon_url = $url;
        }

        $station->save();

        return redirect()->route('station.show', ['station' => $station->id]);
    }


    public function destroy(Station $station)
    {
        //
    }
}
