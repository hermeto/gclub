<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Playoff
 * @property int id
 * @property int challenger_team_id
 * @property int challenged_team_id
 * @property int challenger_score
 * @property int challenged_score
 * @property int phase
 * @package App
 */
class Playoff extends Model
{
    /**
     * @var string
     */
    protected $table = 'playoffs';

    /**
     * @var bool
     */
    public $timestamps = false;

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
