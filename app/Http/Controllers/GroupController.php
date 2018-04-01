<?php

namespace App\Http\Controllers;

use App\Group;
use App\TeamGroup;
use Illuminate\Support\Facades\DB;

/**
 * Class GroupController
 * @package App\Http\Controllers
 */
class GroupController extends Controller
{
    /**
     * Prepare group data for page.
     * @return array
     */
    public function show()
    {
        $groups = [];
        foreach (Group::all() as $key => $group) {
            $groups[$key] = [
                'id' => $group->id,
                'name' => $group->name,
                'teams' => $this->prepareTeams($group->id),
                'open' => (($key) % 4 == 0) ? true : false,
                'close' => (($key + 1) % 4 == 0) ? true : false
            ];
        }
        return view('group')->with('groups', $groups);
    }

    /**
     * Prepare teams data.
     * @param int $group_id
     * @return array
     */
    private function prepareTeams(int $group_id)
    {
        $teamsGroups = TeamGroup::select(DB::raw('teams_groups_mapping.*'))
            ->leftJoin('teams', 'teams.id', '=', 'teams_groups_mapping.team_id')
            ->orderBy('teams.score', 'desc')
            ->orderBy('teams.victory', 'desc')
            ->where('teams_groups_mapping.group_id', '=', $group_id)
            ->get();

        $teamsGroups->load('team');

        $teams = [];
        $count = 0;
        foreach ($teamsGroups as $key => $team) {
            $teams[$key] = $team;
            $teams[$key]['playoffs'] = ($count < 2) ? true : false;
            $count++;
        }
        return $teams;
    }
}