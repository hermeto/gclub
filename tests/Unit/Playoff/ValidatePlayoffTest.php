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
    private $playoff;

    /**
     * ValidatePlayoffTest constructor.
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
     * Test Playoff empty.
     */
    public function testRunPlayoffEmpty()
    {
        $this->playoff->method('isEmpty')->willReturn(true);
        $assert = (new ValidatePlayoff($this->playoff))->run();
        $this->assertEquals(false, $assert);
    }

    /**
     * Test Playoff fully.
     */
    public function testRunPlayoffFully()
    {
        $this->playoff->method('isEmpty')->willReturn(false);
        $assert = (new ValidatePlayoff($this->playoff))->run();
        $this->assertEquals(true, $assert);
    }

    /**
     * Set mock.
     */
    private function setMock()
    {
        try {
            $this->playoff = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:playoff:validate-process-test:constructor - error: ' . $e);
        }
    }
}
