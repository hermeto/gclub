<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Start\CreateGame;
use App\Http\Controllers\Start\JoinTeamGroup;

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
     * - Redirect action for GroupController
     */
    public function process()
    {
        (new JoinTeamGroup())->run();
        (new CreateGame())->run();
        return redirect('/group');
    }
}
