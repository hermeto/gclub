<?php

namespace App\Http\Controllers;

use App\Team;

class GeralController extends Controller
{
    public function show()
    {
        return view('geral')->with(
            'results',
            Team::all()->sortByDesc('score')->sortByDesc('victory')
        );
    }
}