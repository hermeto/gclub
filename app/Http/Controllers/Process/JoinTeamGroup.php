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
     * @var Collection
     */
    private $teamGroup;

    /**
     * JoinTeamGroup constructor.
     * @param Collection $teams
     * @param Collection $groups
     * @param Collection $teamGroup
     */
    public function __construct(Collection $teams, Collection $groups, Collection $teamGroup)
    {
        $this->teams = $teams;
        $this->groups = $groups;
        $this->teamGroup = $teamGroup;
    }

    /**
     * Join a team in a group.
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
        }
        return $this->assertIsFull();
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
        } catch (Exception $e) {
            error_log('app:http:controllers:process:save-team-group - group_id: ' . $group_id . ' - error: ' . $e);
        }
    }

    /**
     * Assert if TeamGroup is full.
     * @return bool
     */
    private function assertIsFull()
    {
        if ($this->teamGroup->isEmpty()) {
            return false;
        }
        return true;
    }
}