<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Start\CreateGame;
use App\Http\Controllers\Start\RuffleTeamGroup;

/**
 * Class StartController
 * @package App\Http\Controllers
 */
class StartController extends Controller
{
    /**
     *
     */
    public function process()
    {
        (new RuffleTeamGroup())->run();
        (new CreateGame())->run();
    }
}
