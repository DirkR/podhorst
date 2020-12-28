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
        //
    }

    public function store(Request $request)
    {
        //
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
        #$show->url = $request->input('url');
        $show->save();

        return redirect()->route('show.show', ['show' => $show->id]);
    }

    public function destroy(Show $show)
    {
        //
    }
}
