<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\TeamGroup;

/**
 * Class ValidateProcess
 * @package App\Http\Controllers\Process
 */
class ValidateProcess extends Controller
{
    /**
     * @return string
     */
    public function run()
    {
        $auth = true;
        $teamsGroups = TeamGroup::all();
        if ($teamsGroups->isEmpty()) {
            $auth = false;
        }
        echo json_encode($auth);
    }
}