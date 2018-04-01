<?php

namespace Tests\Unit\Process;

use App\Http\Controllers\Process\ClearAll;
use Illuminate\Support\Collection;
use ReflectionException;
use Tests\TestCase;

/**
 * Class ClearAllTest
 * @package Tests\Unit
 */
class ClearAllTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $groupResult;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $teamGroup;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $team;

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
        $this->groupResult->method('isEmpty')->willReturn(true);
        $this->teamGroup->method('isEmpty')->willReturn(true);
        $this->team->method('isEmpty')->willReturn(true);
        $result = (new ClearAll($this->groupResult, $this->teamGroup, $this->team))->run();
        $this->assertEquals(false, $result);
    }

    /**
     * Create mock.
     */
    private function setMock()
    {
        try {
            $this->groupResult = $this->createMock(Collection::class);
            $this->teamGroup = $this->createMock(Collection::class);
            $this->team = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:process:clear-all-test:constructor - error: ' . $e);
        }
    }
}
