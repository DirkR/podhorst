<?php

namespace App\Http\Controllers;

use App\Models\Station;

class DashboardController extends Controller
{
    public function index()
    {
        $stations = Station::with('shows.episodes')->get();
        return view('dashboard', compact('stations'));
    }
}
