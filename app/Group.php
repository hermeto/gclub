<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @property int id
 * @property string name
 * @package App
 */
class Group extends Model
{
    /**
     * @var string
     */
    protected $table = 'groups';

    /**
     * @var bool
     */
    public $timestamps = false;
}
