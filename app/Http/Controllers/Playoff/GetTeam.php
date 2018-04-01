<?php 

namespace App\Http\Controllers\Playoff;

use App\AptTeam;
use App\Http\Controllers\Controller;
use App\Playoff;
use App\Team;

class GetTeam extends Controller
{
    /**
     * @var object
     */
    private $teams;

    /**
     * @var int
     */
    private $phase;

    /**
     * @var int
     */
    private $team_id;

    /**
     * GetTeam constructor.
     * @param int $phase
     */
    public function __construct(int $phase)
    {
        $this->teams = AptTeam::select()
            ->inRandomOrder()
            ->get();

        $this->phase = $phase;
    }

    /**
     * @return int
     */
    public function challenger()
    {
        foreach ($this->teams as $team) {
            if ($this->getPlayoffs($team->team_id)) {
                $this->team_id = $team->team_id;
                return $team->team_id;
            }
        }
    }

    /**
     * @return int
     */
    public function challenged()
    {
        foreach ($this->teams as $team) {
            if ($this->getPlayoffs($team->team_id) && ($team->team_id != $this->team_id)) {
                return $team->team_id;
            }
        }
    }

    /**
     * @param int $team_id
     * @return bool
     */
    private function getPlayoffs(int $team_id)
    {
        $playoffsChallenger = Playoff::where([
            ['challenger_team_id', '=', $team_id],
            ['phase', '>=', $this->phase]
        ])->get();

        $playoffsChallenged = Playoff::where([
            ['challenged_team_id', '=', $team_id],
            ['phase', '>=', $this->phase]
        ])->get();

        return (count($playoffsChallenger) == 0 && count($playoffsChallenged) == 0) ? true : false;
    }
}
