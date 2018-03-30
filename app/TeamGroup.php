<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamGroup
 * @property int id
 * @property int team_id
 * @property int group_id
 * @package App
 */
class TeamGroup extends Model
{
    /**
     * @var string
     */
    protected $table = 'teams_groups_mapping';

    /**
     * @var bool
     */
    public $timestamps = false;
}
