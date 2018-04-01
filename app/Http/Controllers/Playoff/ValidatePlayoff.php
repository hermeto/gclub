<?php

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use App\Playoff;

/**
 * Class ValidateProcess
 * @package App\Http\Controllers\Process
 */
class ValidatePlayoff extends Controller
{
    /**
     * @return string
     */
    public function run()
    {
        $auth = true;
        $playoffs = Playoff::all();
        if ($playoffs->isEmpty()) {
            $auth = false;
        }
        echo json_encode($auth);
    }
}