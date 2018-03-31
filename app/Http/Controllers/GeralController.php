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
        $results = [];
        $count = 0;
        foreach (Team::all()->sortByDesc('score')->sortByDesc('victory') as $key => $result) {
            $results[$key] = $result;
            $results[$key]['playoffs'] = ($count > 31) ? false : true;
            $count++;
        }
        return view('geral')->with('results', $results);
    }
}