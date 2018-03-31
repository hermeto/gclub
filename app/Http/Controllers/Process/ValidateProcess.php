<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;

class ValidateProcess extends Controller
{
    public function run()
    {
        if(isset($_SESSION['group'])){
            return false;
        }
        $_SESSION['group'];
        return true;
    }
}