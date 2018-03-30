<?php

namespace App\Http\Controllers\Start;

use App\Group;
use App\Http\Controllers\Controller;
use App\Team;
use App\TeamGroup;

/**
 * Class RuffleTeamGroup
 * @package App\Http\Controllers\Start
 */
class RuffleTeamGroup extends Controller
{
    /**
     * Ruffle a team in a group.
     */
    public function run()
    {
        $groups = Group::all();
        $teams = Team::all();
        $start = 0;
        foreach ($groups as $group) {
            foreach (range(0, 4) as $item) {
                $teamGroup = new TeamGroup();
                $teamGroup->group_id = $group->id;
                $teamGroup->team_id = $teams[$item + $start]->id;
                $teamGroup->save();
            }
            $start += 5;
        }
    }
}