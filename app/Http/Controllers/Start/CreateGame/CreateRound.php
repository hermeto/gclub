<?php

namespace App\Http\Controllers\Start\CreateGame;

use App\Http\Controllers\Controller;

/**
 * Class CreateRound
 * @package App\Http\Controllers\Start\CreateGame
 */
class CreateRound extends Controller
{
    /**
     * Make round.
     */
    public function run()
    {
        $challenger_score = 0;
        $challenged_score = 0;
        while ($challenger_score < 16 && $challenged_score < 16) {
            (bool)rand(0, 1) ? $challenger_score++ : $challenged_score++;
        }
        return [
            'challenger_score' => $challenger_score,
            'challenged_score' => $challenged_score
        ];
    }
}