<?php

namespace App\Http\Controllers;

use App\Team;

/**
 * Class GeralController
 * @package App\Http\Controllers
 */
class GeralController extends Controller
{
    /**
     * Show geral classification.
     * @return $this
     */
    public function show()
    {
        $teams = Team::select()
            ->orderBy('teams.score', 'desc')
            ->orderBy('teams.victory', 'desc')
            ->get();

        $results = [];
        $count = 0;
        foreach ($teams as $key => $result) {
            $results[$key] = $result;
            $results[$key]['playoffs'] = ($count > 31) ? false : true;
            $count++;
        }
        return view('geral')->with('results', $results);
    }
}