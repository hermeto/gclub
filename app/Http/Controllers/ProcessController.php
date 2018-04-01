<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupResult;
use App\Http\Controllers\Process\ClearAll;
use App\Http\Controllers\Process\CreateGame;
use App\Http\Controllers\Process\JoinTeamGroup;
use App\Http\Controllers\Process\ValidateProcess;
use App\Http\Controllers\Playoff\ClearAll as PlayoffClearAll;
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
        if (!$auth = (new JoinTeamGroup(Team::inRandomOrder()->get(), Group::all(), TeamGroup::all()))->run()) {
            error_log('app:http:controllers:process-controller:run - error: Team or Group empty');
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

    /**
     * Reset process.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reset()
    {
        if (!$auth = (new ClearAll(GroupResult::all(), TeamGroup::all(), Team::all()))->run()) {
            error_log('app:http:controllers:process-controller:run - error: Error clear data');
        }

        (new PlayoffClearAll())->run();

        return $this->run();
    }
}
