<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupResult
 * @property int challenger_team_id
 * @property int challenged_team_id
 * @property int group_id
 * @property int challenger_score
 * @property int challenged_score
 * @package App
 */
class GroupResult extends Model
{
    /**
     * @var string
     */
    protected $table = 'groups_results';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Self belongs to Group.
     * @property int id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Self belongs to Team.
     * @property int id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function challengerTeam()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Self belongs to Team.
     * @property int id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function challengedTeam()
    {
        return $this->belongsTo(Team::class);
    }
}
