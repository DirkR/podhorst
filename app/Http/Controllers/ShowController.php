<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Station;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    public function index()
    {
        $shows = Show::all();
        return view("show.list", compact('shows'));
    }

    public function create()
    {
        $stations = Station::all()->pluck('label', 'id');
        $station_id = request()->input('station', $stations->keys()->first());

        return view("show.create", compact('stations', 'station_id'));
    }

    public function store(Request $request)
    {
        $data = $request->only(
            [
                'station_id',
                'label',
                'description',
                'slug',
                'homepage_url',
                'icon_url',
                'day',
                'time-hour',
                'time-minute',
                'duration-hour',
                'duration-minute',
                'active',
            ]
        );

        $data['hour'] = $data['time-hour'];
        $data['minute'] = $data['time-minute'];
        $data['duration'] = intval($data['duration-minute']) + intval($data['duration-hour']) * 60;

        unset($data['time-hour']);
        unset($data['time-minute']);
        unset($data['duration-hour']);
        unset($data['duration-minute']);

        $show = Show::create($data);

        return redirect()->route('show.show', ['show' => $show->id]);
    }

    public function show(Show $show)
    {
        return view("show.show", compact('show'));
    }

    public function edit(Show $show)
    {
        return view("show.edit", compact('show'));
    }

    public function update(Request $request, Show $show)
    {
        $show->label = $request->input('label');
        $show->description = $request->input('description');
        $show->slug = $request->input('slug');
        $show->active = $request->input('active', 1);

        $show->day = $request->input('day', 0);
        $show->hour = $request->input('time-hour', 0);
        $show->minute = $request->input('time-minute', 0);
        $show->duration = intval($request->input('duration-minute', 0)) +
            intval($request->input('duration-hour', 0)) * 60;


        if ($url = $request->input('homepage_url')) {
            $show->homepage_url = $url;
        }

        if ($url = $request->input('icon_url')) {
            $show->icon_url = $url;
        }

        $show->save();

        return redirect()->route('show.show', ['show' => $show->id]);
    }

    public function destroy(Show $show)
    {
        //
    }
}
