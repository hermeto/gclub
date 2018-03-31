<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Playoff\CreateGame;

/**
 * Class PlayoffController
 * @package App\Http\Controllers
 */
class PlayoffController extends Controller
{
    /**
     *
     */
    public function process()
    {
        foreach (range(0, 4) as $phase) {
            (new CreateGame($phase))->run();
        }
    }
}