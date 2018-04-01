<?php 

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

/**
 * Class ValidateProcess
 * @package App\Http\Controllers\Process
 */
class ValidatePlayoff extends Controller
{
    /**
     * @var Collection
     */
    private $playoffs;

    public function __construct(Collection $playoffs)
    {
        $this->playoffs = $playoffs;
    }

    /**
     * @return string
     */
    public function run()
    {
        $auth = true;
        if ($this->playoffs->isEmpty()) {
            $auth = false;
        }
        return $auth;
    }
}
