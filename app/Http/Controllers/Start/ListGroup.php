<?php


namespace App\Http\Controllers\Start;

use App\Group;
use App\Http\Controllers\Controller;
use App\TeamGroup;

/**
 * Class ListGroup
 * @package App\Http\Controllers\Start
 */
class ListGroup extends Controller
{
    /**
     * Prepare group data for page.
     * @return array
     */
    public function run()
    {
        $data = [];
        foreach (Group::all() as $key => $group) {
            $data[$key] = [
                'id' => $group->id,
                'name' => $group->name,
                'teams' => TeamGroup::with(['team'])->where('group_id', '=', $group->id)->get(),
                'open' => (($key) % 4 === 0) ? true : false,
                'close' => (($key + 1) % 4 === 0) ? true : false
            ];
        }
        return $data;
    }
}