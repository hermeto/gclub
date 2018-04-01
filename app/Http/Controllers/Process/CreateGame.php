<?php 

namespace App\Http\Controllers\Process;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CreateRound;
use App\Http\Controllers\Process\CreateGame\SaveGroupResult;
use App\Http\Controllers\Process\CreateGame\SaveTeamScore;
use App\TeamGroup;

/**
 * Class CreateGame
 * @package App\Http\Controllers\Process
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
                        error_log('app:http:controllers:process:create-game - challenger: ' . $challenger->id . ' x challenged: ' . $challenged->id);
                    }
                }
            }
        }
    }
}
