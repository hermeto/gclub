<?php

namespace App\Http\Controllers\Start;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Start\CreateGames\CreateRound;
use App\Http\Controllers\Start\CreateGames\SaveGroupResult;
use App\Http\Controllers\Start\CreateGames\SaveTeamScore;
use App\TeamGroup;

/**
 * Class CreateGame
 * @package App\Http\Controllers\Start
 */
class CreateGame extends Controller
{
    /**
     * Create games.
     */
    public function run()
    {
        foreach (Group::all() as $group) {
            $teamGroup = TeamGroup::where('group_id', $group->id)->get();
            foreach ($teamGroup as $challenger) {
                foreach ($teamGroup as $challenged) {
                    if ($challenger->team_id != $challenged->team_id) {
                        $result = (new CreateRound())->run();
                        (new SaveGroupResult(
                            $group->id,
                            $challenger->team_id,
                            $challenged->team_id,
                            $result['challenger_score'],
                            $result['challenged_score'])
                        )->run();
                        (new SaveTeamScore(
                            $challenger->team_id,
                            $challenged->team_id,
                            $result['challenger_score'],
                            $result['challenged_score']
                        ))->run();
                    }
                }
            }
        }
    }
}