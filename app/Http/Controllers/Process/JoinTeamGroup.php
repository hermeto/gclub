<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\TeamGroup;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class JoinTeamGroup
 * @package App\Http\Controllers\Process
 */
class JoinTeamGroup extends Controller
{
    /**
     * @var Collection
     */
    private $teams;

    /**
     * @var Collection
     */
    private $groups;

    /**
     * JoinTeamGroup constructor.
     * @param Collection $teams
     * @param Collection $groups
     */
    public function __construct(Collection $teams, Collection $groups)
    {
        $this->teams = $teams;
        $this->groups = $groups;
    }

    /**
     * Join a team in a group.
     * @return bool
     */
    public function run()
    {
        $start = 0;
        if ($this->teams->isNotEmpty() && $this->groups->isNotEmpty()) {
            foreach ($this->groups as $group) {
                foreach (range(0, 4) as $item) {
                    $this->saveTeamGroup($group->id, $item, $start);
                }
                $start += 5;
            }
            return true;
        }
        return false;
    }

    /**
     * Save TeamGroup.
     * @param int $group_id
     * @param int $item
     * @param int $start
     */
    private function saveTeamGroup(int $group_id, int $item, int $start)
    {
        try {
            $teamGroup = new TeamGroup();
            $teamGroup->group_id = $group_id;
            $teamGroup->team_id = $this->teams[$item + $start]->id;
            $teamGroup->save();
            error_log('app:http:controllers:process:save-team-group - group_id: ' . $group_id . ' - team_id: ' . $this->teams[$item + $start]->id);
        } catch (Exception $e) {
            error_log('app:http:controllers:process:save-team-group - group_id: ' . $group_id . ' - error: ' . $e);
        }
    }
}