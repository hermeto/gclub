<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamGroup
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

    /**
     * Self belongs to Team
     * @property int id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Self belongs to Group
     * @property int id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
