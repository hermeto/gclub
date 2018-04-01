<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Playoff\ClearAll;
use App\Http\Controllers\Playoff\CreateGame;
use App\Http\Controllers\Playoff\ValidatePlayoff;
use App\Playoff;
use Request;

/**
 * Class PlayoffController
 * @package App\Http\Controllers
 */
class PlayoffController extends Controller
{
    /**
     * Run playoffs process.
     */
    public function run()
    {
        foreach (range(0, 4) as $phase) {
            (new CreateGame($phase))->run();
        }
        return redirect('/playoff/result/0');
    }

    /**
     * Validate playoffs.
     */
    public function valid()
    {
        echo json_encode(
            (new ValidatePlayoff(
                Playoff::all())
            )->run()
        );
    }

    /**
     * Reset process.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reset()
    {
        (new ClearAll())->run();

        return $this->run();
    }

    /**
     * Show results.
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

        return view('playoff')
            ->with('phase', $phase)
            ->with('results', $results);
    }
}