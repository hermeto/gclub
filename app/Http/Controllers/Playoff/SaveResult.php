<?php

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use App\Playoff;

/**
 * Class SaveResult
 * @package App\Http\Controllers\Playoff
 */
class SaveResult extends Controller
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
     * @var int
     */
    private $phase;

    /**
     * SaveResult constructor.
     * @param int $challenger_team_id
     * @param int $challenged_team_id
     * @param int $challenger_score
     * @param int $challenged_score
     * @param int $phase
     */
    public function __construct(
        int $challenger_team_id,
        int $challenged_team_id = null,
        int $challenger_score,
        int $challenged_score = null,
        int $phase
    )
    {
        $this->challenger_team_id = $challenger_team_id;
        $this->challenged_team_id = $challenged_team_id;
        $this->challenger_score = $challenger_score;
        $this->challenged_score = $challenged_score;
        $this->phase = $phase;
    }

    /**
     *
     */
    public function run()
    {
        $playoff = new Playoff();
        $playoff->challenger_team_id = $this->challenger_team_id;
        $playoff->challenged_team_id = $this->challenged_team_id;
        $playoff->challenger_score = $this->challenger_score;
        $playoff->challenged_score = $this->challenged_score;
        $playoff->phase = $this->phase;
        $playoff->save();
    }
}