<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class EpisodeController extends Controller
{

    public function index()
    {
        $episodes = Episode::all();
        return view("episode.list", compact('episodes'));
    }

    public function show(Episode $episode)
    {
        return view("episode.show", ['episode' => $episode]);
    }

}
