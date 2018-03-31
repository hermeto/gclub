<?php

namespace App\Http\Controllers;

use App\GroupResult;
use Request;

/**
 * Class MatchController
 * @package App\Http\Controllers
 */
class MatchController extends Controller
{
    /**
     * @var int
     */
    private $id;

    /**
     * MatchController constructor.
     */
    public function __construct()
    {
        $this->id = Request::route('id');
    }

    /**
     * Get results.
     * @return $this
     */
    public function show()
    {
        $results = [];
        foreach (GroupResult::with(['group', 'challengerTeam', 'challengedTeam'])
                     ->where('group_id', '=', $this->id)
                     ->get() as $key => $result) {
            $results[$key] = $result;
            $results[$key]['open'] = (($key) % 5 == 0) ? true : false;
            $results[$key]['close'] = (($key + 1) % 5 == 0) ? true : false;
            $results[$key]['winner'] = ($result->challenger_score > $result->challenged_score) ? true : false;
        }
        return view('group/match')->with('results', $results);
    }
}