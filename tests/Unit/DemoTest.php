<?php

namespace Tests\Unit;

use App\Services\TestService;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add()
    {
        $result = (new TestService())->add(4, 6);
        $this->assertEquals(1, $result);
    }
}
