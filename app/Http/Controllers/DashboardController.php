<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Station;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stations = Station::with('shows.episodes')->get();
        return view('dashboard', compact('stations'));
    }

    public function upcoming()
    {
        $upcoming_shows = Show::where('next_recording_at', '>=', Carbon::now())
            ->orderBy('next_recording_at')
            ->get();

        $no_shows = Show::where('next_recording_at', '<', Carbon::now())
            ->orWhere('next_recording_at', null)
            ->orderBy('label')
            ->get();
        return view('upcoming', compact('upcoming_shows', 'no_shows'));
    }

}
