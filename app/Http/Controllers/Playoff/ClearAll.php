<?php

namespace App\Http\Controllers\Playoff;

use App\Http\Controllers\Controller;
use App\Playoff;
use Illuminate\Support\Collection;

/**
 * Class ClearAll
 * @package App\Http\Controllers\Playoff
 */
class ClearAll extends Controller
{
    /**
     * @var Collection
     */
    private $playoff;

    /**
     * ClearAll constructor.
     * @param Collection $playoff
     */
    public function __construct(Collection $playoff)
    {
        $this->playoff = $playoff;
    }

    /**
     * Truncate models.
     */
    public function run()
    {
        if (!$this->playoff->isEmpty()) {
            foreach ($this->playoff as $playoff) {
                Playoff::destroy($playoff->id);
                error_log('app:http:controllers:playoff:run - id: ' . $playoff->id);
            }
            return true;
        }
        return false;
    }
}
