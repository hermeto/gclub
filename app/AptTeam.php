<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AptTeam
 * @property int id
 * @property int team_id
 * @package App
 */
class AptTeam extends Model
{
    /**
     * @var string
     */
    protected $table = 'apt_teams';

    /**
     * @var bool
     */
    public $timestamps = false;
}
