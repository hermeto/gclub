<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupResult;
use Request;

class MatchController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = Request::route('id');
    }

    public function show()
    {
        $results = [];
        foreach (GroupResult::with(['group', 'challengerTeam', 'challengedTeam'])
                     ->where('group_id', '=', $this->id)
                     ->get() as $key => $result) {
            $results[$key] = $result;
            $results[$key]['open'] = (($key) % 5 == 0) ? true : false;
            $results[$key]['close'] = (($key + 1) % 5 == 0) ? true : false;
        }
        return view('group/match')->with('results', $results);
    }
}