<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class EpisodeController extends Controller
{

    public function index()
    {
        $episodes = Episode::orderByDesc('created_at')->get();
        return view("episode.list", compact('episodes'));
    }

    public function show(Episode $episode)
    {
        return view("episode.show", ['episode' => $episode]);
    }

}
