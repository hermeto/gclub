<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;

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
        if(isset($_SESSION['group'])){
            echo json_encode(false);
        }
        $_SESSION['group'] = true;
        echo json_encode(true);
    }
}