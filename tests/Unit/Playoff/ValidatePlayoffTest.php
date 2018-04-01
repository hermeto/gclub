<?php

namespace Tests\Unit\Playoff;

use App\Http\Controllers\Playoff\ValidatePlayoff;
use Illuminate\Database\Eloquent\Collection;
use ReflectionException;
use Tests\TestCase;

/**
 * Class ValidatePlayoffTest
 * @package Tests\Unit\Playoff
 */
class ValidatePlayoffTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $collection;

    /**
     * ValidatePlayoffTest constructor.
     * @param null|string $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        try {
            $this->collection = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:playoff:validate-process-test:constructor - error: ' . $e);
        }
    }

    /**
     * Test Playoff empty.
     */
    public function testRunPlayoffEmpty()
    {
        $this->collection->method('isEmpty')->willReturn(true);
        $assert = (new ValidatePlayoff($this->collection))->run();
        $this->assertEquals(false, $assert);
    }

    /**
     * Test Playoff fully.
     */
    public function testRunPlayoffFully()
    {
        $this->collection->method('isEmpty')->willReturn(false);
        $assert = (new ValidatePlayoff($this->collection))->run();
        $this->assertEquals(true, $assert);
    }
}
