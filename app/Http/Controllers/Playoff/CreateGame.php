<?php

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Start\CreateGame\CreateRound;

/**
 * Class CreateGame
 * @package App\Http\Controllers\Playoff
 */
class CreateGame extends Controller
{
    /**
     * @var int
     */
    private $phase;

    private $games = ['15', '7', '3', '1'];

    /**
     * CreateGame constructor.
     * @param int $phase
     */
    public function __construct(int $phase)
    {
        $this->phase = $phase;
    }

    /**
     * Create games.
     */
    public function run()
    {
//        if ($this->phase == 4) {
//            $this->makeTheChampion();
//        } else {
            foreach (range(0, $this->games[$this->phase]) as $game) {
                $result = (new CreateRound())->run();
                $team = new GetTeam($this->phase);
                (new SaveResult(
                    $team->challenger(),
                    $team->challenged(),
                    $result['challenger_score'],
                    $result['challenged_score'],
                    $this->phase
                ))->run();
            }
//        }
    }

    private function makeTheChampion()
    {
        dump('MAKE CHAMPION');
    }
}