<?php 

namespace App\Http\Controllers\Process\CreateGame;

use App\GroupResult;
use App\Http\Controllers\Controller;

/**
 * Class CreateRound
 * @package App\Http\Controllers\Process\CreateGame
 */
class SaveGroupResult extends Controller
{
    /**
     * @var int
     */
    private $group_id;

    /**
     * @var int
     */
    private $challenger_team_id;

    /**
     * @var int
     */
    private $challenged_team_id;

    /**
     * @var int
     */
    private $challenger_score;

    /**
     * @var int
     */
    private $challenged_score;

    /**
     * CreateRound constructor.
     * @param int $group_id
     * @param int $challenger_team_id
     * @param int $challenged_team_id
     * @param int $challenger_score
     * @param int $challenged_score
     */
    public function __construct(
        int $group_id,
        int $challenger_team_id,
        int $challenged_team_id,
        int $challenger_score,
        int $challenged_score
    ) {
        $this->group_id = $group_id;
        $this->challenger_team_id = $challenger_team_id;
        $this->challenged_team_id = $challenged_team_id;
        $this->challenger_score = $challenger_score;
        $this->challenged_score = $challenged_score;
    }

    /**
     * Save result.
     */
    public function run()
    {
        $groupResult = new GroupResult();
        $groupResult->group_id = $this->group_id;
        $groupResult->challenger_team_id = $this->challenger_team_id;
        $groupResult->challenger_score = $this->challenger_score;
        $groupResult->challenged_team_id = $this->challenged_team_id;
        $groupResult->challenged_score = $this->challenged_score;
        $groupResult->save();
    }
}
