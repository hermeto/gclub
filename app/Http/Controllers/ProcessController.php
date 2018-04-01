<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Process\ClearAll;
use App\Http\Controllers\Process\CreateGame;
use App\Http\Controllers\Process\JoinTeamGroup;
use App\Http\Controllers\Process\ValidateProcess;

/**
 * Class ProcessController
 * @package App\Http\Controllers
 */
class ProcessController extends Controller
{
    /**
     * Runs the following steps:
     * - Joins a team in a group
     * - Creates games between teams
     * - - Creates rounds for teams
     * - Redirect action for GroupController
     */
    public function run()
    {
        (new ClearAll())->run();
        (new JoinTeamGroup())->run();
        (new CreateGame())->run();
        return redirect('/group');
    }

    /**
     * Validate process.
     */
    public function valid()
    {
        (new ValidateProcess())->run();
    }
}
