<?php

namespace App\Http\Controllers;

use App\Group;
use App\TeamGroup;

/**
 * Class GroupController
 * @package App\Http\Controllers\Start
 */
class GroupController extends Controller
{
    /**
     * Prepare group data for page.
     * @return array
     */
    public function show()
    {
        $groups = [];
        foreach (Group::all() as $key => $group) {
            $data[$key] = [
                'id' => $group->id,
                'name' => $group->name,
                'teams' => TeamGroup::with(['team'])->where('group_id', '=', $group->id)->get(),
                'open' => (($key) % 4 == 0) ? true : false,
                'close' => (($key + 1) % 4 == 0) ? true : false
            ];
        }
        return view('group')->with('groups', $groups);
    }
}