<?php

namespace Tests\Unit\Playoff;

use App\Http\Controllers\Playoff\ClearAll;
use Illuminate\Support\Collection;
use ReflectionException;
use Tests\TestCase;


class ClearAllTest extends TestCase
{
    private $playoff;

    /**
     * JoinTeamGroupTest constructor.
     * @param null|string $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->setMock();
    }

    /**
     * Test save TeamGroup with data.
     * * Test in inconsistent.
     */
    public function testAllEmpty()
    {
        $this->playoff->method('isEmpty')->willReturn(true);
        $result = (new ClearAll($this->playoff))->run();
        $this->assertEquals(false, $result);
    }

    /**
     * Create mock.
     */
    private function setMock()
    {
        try {
            $this->playoff = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:playoff:clear-all-test:constructor - error: ' . $e);
        }
    }
}
