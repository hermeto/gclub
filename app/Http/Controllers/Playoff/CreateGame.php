<?php 

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Playoff\CreateGame\SavePlayoffResult;
use App\Http\Controllers\Common\CreateRound;
use App\Http\Controllers\Playoff\CreateGame\SaveAptTeam;

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

    /**
     * @var array
     */
    private $games = ['15', '7', '3', '1', '0'];

    /**
     * CreateGame constructor.
     * @param int $phase
     */
    public function __construct(int $phase)
    {
        $this->phase = $phase;
        (new SaveAptTeam($phase))->run();
    }

    /**
     * Create games.
     */
    public function run()
    {
        foreach (range(0, $this->games[$this->phase]) as $game) {
            $result = (new CreateRound())->run();
            $team = new GetTeam($this->phase);
            (new SavePlayoffResult(
                $team->challenger(),
                $team->challenged(),
                $result['challenger_score'],
                $result['challenged_score'],
                $this->phase
            ))->run();
        }
    }
}
