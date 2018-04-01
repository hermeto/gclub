<?php

namespace App\Http\Controllers\Process;

use App\GroupResult;
use App\Http\Controllers\Controller;
use App\Team;
use App\TeamGroup;
use Illuminate\Support\Collection;

/**
 * Class ClearAll
 * @package App\Http\Controllers\Process
 */
class ClearAll extends Controller
{
    /**
     * @var Collection
     */
    private $groupResult;

    /**
     * @var Collection
     */
    private $teamGroup;

    /**
     * @var Collection
     */
    private $team;

    /**
     * ClearAll constructor.
     * @param Collection $groupResult
     * @param Collection $teamGroup
     * @param Collection $team
     */
    public function __construct(
        Collection $groupResult,
        Collection $teamGroup,
        Collection $team
    )
    {
        $this->groupResult = $groupResult;
        $this->teamGroup = $teamGroup;
        $this->team = $team;
    }

    /**
     * Truncate models.
     */
    public function run()
    {
        $auth = true;
        if (!$this->clearGroupResult()) {
            $auth = false;
        }
        if ($this->clearTeamGroup()) {
            $auth = false;
        }
        $this->clearResultTeam();
        return $auth;
    }

    /**
     * @return bool
     */
    private function clearGroupResult()
    {
        if (!$this->groupResult->isEmpty()) {
            foreach ($this->groupResult as $groupResult) {
                GroupResult::destroy($groupResult->id);
                error_log('app:http:controllers:process:clear-all:clear-group-result - id: ' . $groupResult->id);
            }
        }
        if ($this->groupResult->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    private function clearTeamGroup()
    {
        if (!$this->teamGroup->isEmpty()) {
            foreach ($this->teamGroup as $teamGroup) {
                TeamGroup::destroy($teamGroup->id);
                error_log('app:http:controllers:process:clear-all:clear-team-group - id: ' . $teamGroup->id);
            }
        }
        if ($this->teamGroup->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     *
     */
    private function clearResultTeam()
    {
        foreach ($this->team as $team) {
            $update = Team::find($team->id);
            $update->score = 0;
            $update->victory = 0;
            $update->save();
            error_log('app:http:controllers:process:clear-all:clear-result-team - id: ' . $team->id);
        }
    }
}