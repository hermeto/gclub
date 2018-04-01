<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

/**
 * Class CreateRound
 * @package App\Http\Controllers\Process\CreateGame
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
        error_log('app:http:controllers:process:create-game - challenger_score: ' . $challenger_score . ' x challenged_score: ' . $challenged_score);
        return [
            'challenger_score' => $challenger_score,
            'challenged_score' => $challenged_score
        ];
    }
}