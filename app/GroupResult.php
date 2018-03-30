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
}
