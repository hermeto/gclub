<?php


namespace App\Http\Controllers\Playoff\CreateGame;

use App\AptTeam;
use App\Http\Controllers\Controller;
use App\Playoff;
use App\Team;

/**
 * Class SetAptTeam
 * @package App\Http\Controllers\Playoff\CreateGame
 */
class SetAptTeam extends Controller
{
    private $teams;

    /**
     * SetAptTeam constructor.
     * @param int $phase
     */
    public function __construct(int $phase)
    {
        $this->resetAptTeam();
        if ($phase == 0) {
            $this->startAptTeam();
        } else {
            $this->nextAptTeam($phase);
        }
    }

    /**
     *
     */
    public function run()
    {
        foreach ($this->teams as $team) {
            $aptTeam = new AptTeam();
            $aptTeam->team_id = $team['id'];
            $aptTeam->save();
        }
    }

    /**
     * @param int $phase
     */
    private function nextAptTeam(int $phase)
    {
        $playoffs = Playoff::select()->where('phase', '=', $phase - 1)->get();

        foreach ($playoffs as $playoff) {
            if ($playoff->challenger_score > $playoff->challenged_score) {
                $this->teams[]['id'] = $playoff->challenger_team_id;
            } else {
                $this->teams[]['id'] = $playoff->challenged_team_id;
            }
        }
    }

    /**
     * @return mixed
     */
    private function startAptTeam()
    {
        $teams = Team::select('teams.id')
            ->orderBy('teams.score', 'desc')
            ->orderBy('teams.victory', 'desc')
            ->limit(32)
            ->inRandomOrder()
            ->get();

        foreach ($teams as $team) {
            $this->teams[]['id'] = $team->id;
        }
    }

    /**
     *
     */
    private function resetAptTeam()
    {
        foreach (AptTeam::all() as $aptTeam) {
            AptTeam::destroy($aptTeam->id);
        }
    }
}