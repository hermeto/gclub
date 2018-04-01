<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\TeamGroup;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ValidateProcess
 * @package App\Http\Controllers\Process
 */
class ValidateProcess extends Controller
{
    /**
     * @var TeamGroup
     */
    private $teamGroup;

    /**
     * ValidateProcess constructor.
     * @param Collection $teamGroup
     */
    public function __construct(Collection $teamGroup)
    {
        $this->teamGroup = $teamGroup;
    }

    /**
     * @return string
     */
    public function run()
    {
        $auth = true;
        if ($this->teamGroup->isEmpty()) {
            $auth = false;
        }
        return $auth;
    }
}
