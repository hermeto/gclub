<?php

namespace App\Http\Controllers\Process;

use App\GroupResult;
use App\Http\Controllers\Controller;
use App\Team;
use App\TeamGroup;

/**
 * Class ClearAll
 * @package App\Http\Controllers\Process
 */
class ClearAll extends Controller
{
    /**
     * Truncate models.
     */
    public function run()
    {
        GroupResult::truncate();
        foreach (TeamGroup::all() as $teamGroup) {
            TeamGroup::destroy($teamGroup->id);
        }
        foreach (Team::all() as $team) {
            $update = Team::find($team->id);
            $update->score = 0;
            $update->victory = 0;
            $update->save();
        }
    }
}