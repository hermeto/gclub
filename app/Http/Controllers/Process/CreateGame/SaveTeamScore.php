<?php 

namespace App\Http\Controllers\Process\CreateGame;

use App\Http\Controllers\Controller;
use App\Team;

/**
 * Class SaveTeamScore
 * @package App\Http\Controllers\Process\CreateGame
 */
class SaveTeamScore extends Controller
{
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
     * SaveTeamScore constructor.
     * @param int $challenger_team_id
     * @param int $challenged_team_id
     * @param int $challenger_score
     * @param int $challenged_score
     */
    public function __construct(
        int $challenger_team_id,
        int $challenged_team_id,
        int $challenger_score,
        int $challenged_score
    ) {
        $this->challenger_team_id = $challenger_team_id;
        $this->challenged_team_id = $challenged_team_id;
        $this->challenger_score = $challenger_score;
        $this->challenged_score = $challenged_score;
    }

    /**
     * Save results for teams.
     */
    public function run()
    {
        $challenger = Team::find($this->challenger_team_id);
        $challenger->victory = $challenger->victory + $this->challenger_score;

        $challenged = Team::find($this->challenged_team_id);
        $challenged->victory = $challenged->victory + $this->challenged_score;

        if ($this->challenger_score > $this->challenged_score) {
            $challenger->score = $challenger->score + 1;
        } else {
            $challenged->score = $challenged->score + 1;
        }

        $challenger->save();
        $challenged->save();
    }
}
