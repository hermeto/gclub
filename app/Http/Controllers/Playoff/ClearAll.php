<?php

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use App\Playoff;

/**
 * Class ClearAll
 * @package App\Http\Controllers\Playoff
 */
class ClearAll extends Controller
{
    /**
     * Truncate models.
     */
    public function run()
    {
        foreach (Playoff::all() as $playoff) {
            Playoff::destroy($playoff->id);
        }
    }
}
