<?php

namespace bigpaulie\jenkins\tests;

use bigpaulie\jenkins\Talk;
use PHPUnit\Framework\TestCase;

/**
 * Class TalkTest
 * @package bigpaulie\jenkins\tests
 */
class TalkTest extends TestCase
{

    private $talk;

    protected function setUp()
    {
        parent::setUp();
        $this->talk = new Talk();
    }

    public function testSayHelloShouldPass()
    {
        $name = "Paul";
        $this->assertEquals(sprintf("Hello %s", $name), $this->talk->sayHello($name));
    }
}