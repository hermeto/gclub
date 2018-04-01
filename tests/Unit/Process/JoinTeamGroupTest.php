<?php 

namespace Tests\Unit\Process;

use App\Http\Controllers\Process\JoinTeamGroup;
use Illuminate\Database\Eloquent\Collection;
use ReflectionException;
use Tests\TestCase;

/**
 * Class JoinTeamGroupTest
 * @package Tests\Unit
 */
class JoinTeamGroupTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $teams;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $groups;

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
     * Test save TeamGroup without data.
     */
    public function testJoinTeamGroupEmpty()
    {
        $this->teams->method('isNotEmpty')->willReturn(false);
        $this->groups->method('isNotEmpty')->willReturn(false);
        $result = (new JoinTeamGroup($this->teams, $this->groups))->run();
        $this->assertEquals(false, $result);
    }

    /**
     * Create mock.
     */
    private function setMock()
    {
        try {
            $this->teams = $this->createMock(Collection::class);
            $this->groups = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:process:join-team-group-test:constructor - error: ' . $e);
        }
    }
}
