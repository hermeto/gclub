<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * @property int id
 * @property string name
 * @package App
 */
class Team extends Model
{
    /**
     * @var string
     */
    protected $table = 'teams';

    /**
     * @var bool
     */
    public $timestamps = false;
}
