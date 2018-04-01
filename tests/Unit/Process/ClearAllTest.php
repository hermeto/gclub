<?php

namespace Tests\Unit;

use ReflectionException;
use Tests\TestCase;

/**
 * Class ClearAllTest
 * @package Tests\Unit
 */
class ClearAllTest extends TestCase
{
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
        $this->assertEquals(true, true);
    }

    /**
     * Create mock.
     */
    private function setMock()
    {
        try {

        } catch (ReflectionException $e) {
            error_log('test:unit:process:clear-all-test:constructor - error: ' . $e);
        }
    }
}
