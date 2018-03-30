<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Start\CreateGame;
use App\Http\Controllers\Start\JoinTeamGroup;
use App\Http\Controllers\Start\ListGroup;

/**
 * Class StartController
 * @package App\Http\Controllers
 */
class StartController extends Controller
{
    /**
     * Runs the following steps:
     * - Joins a team in a group
     * - Creates games between teams
     * - - Creates rounds for teams
     * - Prepares data for view
     */
    public function process()
    {
        (new JoinTeamGroup())->run();
        (new CreateGame())->run();
        return view('group')->with('groups', (new ListGroup())->run());
    }
}
