<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Playoff\CreateGame;
use App\Playoff;
use Request;

/**
 * Class PlayoffController
 * @package App\Http\Controllers
 */
class PlayoffController extends Controller
{
    /**
     *
     */
    public function run()
    {
        foreach (range(0, 4) as $phase) {
            (new CreateGame($phase))->run();
        }
        return redirect('/playoffs/result');
    }

    /**
     * @return $this
     */
    public function show()
    {
        $phase = Request::route('phase');
        $results = [];
        foreach (Playoff::with(['challengerTeam', 'challengedTeam'])
                     ->where('phase', '=', $phase)
                     ->get() as $key => $result) {
            $results[$key] = $result;
            $results[$key]['open'] = (($key) % 4 == 0) ? true : false;
            $results[$key]['close'] = (($key + 1) % 4 == 0) ? true : false;
            $results[$key]['winner'] = ($result->challenger_score > $result->challenged_score) ? true : false;
        }

        return view('playoffs')
            ->with('phase', $phase)
            ->with('results', $results);
    }
}