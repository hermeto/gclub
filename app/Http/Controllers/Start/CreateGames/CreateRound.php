<?php

namespace App\Http\Controllers\Start\CreateGames;

use App\GroupResult;
use App\Http\Controllers\Controller;

/**
 * Class CreateRound
 * @package App\Http\Controllers\Start\CreateGame
 */
class CreateRound extends Controller
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
     * CreateRound constructor.
     * @param int $group_id
     * @param int $challenger_team_id
     * @param int $challenged_team_id
     */
    public function __construct(int $group_id, int $challenger_team_id, int $challenged_team_id)
    {
        $this->group_id = $group_id;
        $this->challenger_team_id = $challenger_team_id;
        $this->challenged_team_id = $challenged_team_id;
    }

    /**
     * Make round.
     */
    public function run()
    {
        $challenger_score = 0;
        $challenged_score = 0;
        while ($challenger_score < 16 && $challenged_score < 16) {
            dump('criando rounds');
            (bool)rand(0, 1) ? $challenger_score++ : $challenged_score++;
        }
        $this->saveResult($challenger_score, $challenged_score);
    }

    /**
     * Save result.
     * @param int $challenger_score
     * @param int $challenged_score
     */
    private function saveResult(int $challenger_score, int $challenged_score)
    {
        $groupResult = new GroupResult();
        $groupResult->group_id = $this->group_id;
        $groupResult->challenger_team_id = $this->challenger_team_id;
        $groupResult->challenger_score = $challenger_score;
        $groupResult->challenged_team_id = $this->challenged_team_id;
        $groupResult->challenged_score = $challenged_score;
        $groupResult->save();
    }
}