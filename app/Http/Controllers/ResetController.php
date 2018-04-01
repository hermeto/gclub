<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Process\ClearAll;

/**
 * Class ResetController
 * @package App\Http\Controllers
 */
class ResetController extends Controller
{
    /**
     * Clear all process.
     */
    public function run()
    {
        (new ClearAll())->run();
    }
}