<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Controllers\Process\ClearAll;
use App\Http\Controllers\Process\CreateGame;
use App\Http\Controllers\Process\JoinTeamGroup;
use App\Http\Controllers\Process\ValidateProcess;
use App\Team;
use App\TeamGroup;

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

        if (!(new JoinTeamGroup(Team::inRandomOrder()->get(), Group::all(), TeamGroup::all()))->run()) {
            error_log('app:http:controllers:process-controller:run - error: TeamGroup empty');
        };

        (new CreateGame())->run();
        return redirect('/group');
    }

    /**
     * Validate process.
     */
    public function valid()
    {
        echo json_encode(
            (new ValidateProcess(
                TeamGroup::all())
            )->run()
        );
    }
}
