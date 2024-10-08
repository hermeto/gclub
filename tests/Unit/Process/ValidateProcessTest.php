<?php 

namespace Tests\Unit\Process;

use App\Http\Controllers\Process\ValidateProcess;
use Illuminate\Database\Eloquent\Collection;
use ReflectionException;
use Tests\TestCase;

/**
 * Class ValidateProcessTest
 * @package Tests\Unit
 */
class ValidateProcessTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $teamGroup;

    /**
     * ValidateProcessTest constructor.
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
     * Test TeamGroup empty.
     */
    public function testRunTeamGroupEmpty()
    {
        $this->teamGroup->method('isEmpty')->willReturn(true);
        $result = (new ValidateProcess($this->teamGroup))->run();
        $this->assertEquals(false, $result);
    }

    /**
     * Test TeamGroup fully.
     */
    public function testRunTeamGroupFully()
    {
        $this->teamGroup->method('isEmpty')->willReturn(false);
        $result = (new ValidateProcess($this->teamGroup))->run();
        $this->assertEquals(true, $result);
    }

    /**
     * Set mock.
     */
    private function setMock()
    {
        try {
            $this->teamGroup = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:process:validate-process-test:constructor - error: ' . $e);
        }
    }
}
