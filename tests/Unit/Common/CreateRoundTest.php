<?php 

namespace Tests\Unit\Common;

use App\Http\Controllers\Common\CreateRound;
use Tests\TestCase;

/**
 * Class CreateRoundTest
 * @package Tests\Unit
 */
class CreateRoundTest extends TestCase
{
    /**
     * Test if return is a array.
     */
    public function testCreateRoundIsArray()
    {
        $result = (new CreateRound())->run();
        $this->assertEquals(true, is_array($result));
    }
}
