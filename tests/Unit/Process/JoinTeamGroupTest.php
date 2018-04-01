<?php

namespace Tests\Unit;

use App\Http\Controllers\Process\JoinTeamGroup;
use Illuminate\Database\Eloquent\Collection;
use ReflectionException;
use Tests\TestCase;

class JoinTeamGroupTest extends TestCase
{
    private $teams;

    private $groups;

    private $teamGroup;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        try {
            $this->teams = $this->createMock(Collection::class);
            $this->groups = $this->createMock(Collection::class);
            $this->teamGroup = $this->createMock(Collection::class);
        } catch (ReflectionException $e) {
            error_log('test:unit:process:join-team-group-test:constructor - error: ' . $e);
        }
    }

    public function testJoinTeamGroupFully()
    {
        $this->teams->method('isNotEmpty')->willReturn(true);
        $this->groups->method('isNotEmpty')->willReturn(true);
        $this->groups->method('isEmpty')->willReturn(false);
        $assert = (new JoinTeamGroup($this->teams, $this->groups, $this->teamGroup))->run();
        $this->assertEquals(true, $assert);
    }

    public function testJoinTeamGroupEmpty()
    {
        $this->teams->method('isNotEmpty')->willReturn(false);
        $this->groups->method('isNotEmpty')->willReturn(false);
        $this->groups->method('isEmpty')->willReturn(true);
        $assert = (new JoinTeamGroup($this->teams, $this->groups, $this->teamGroup))->run();
        $this->assertEquals(true, $assert);
    }
}
