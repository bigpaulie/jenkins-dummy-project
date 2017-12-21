<?php

namespace bigpaulie\jenkins\tests;

use bigpaulie\jenkins\Person;
use bigpaulie\jenkins\Talk;
use PHPUnit\Framework\TestCase;
use Mockery AS Mock;

/**
 * Class PersonTest
 * @package bigpaulie\jenkins\tests
 */
class PersonTest extends TestCase
{

    /**
     * Mock of Talk.
     *
     * @var Talk $talk
     */
    private $talk;

    /**
     * This test should pass
     * Testing the greeting method.
     *
     * @return void
     */
    public function testGreetShouldPass()
    {
        $this->talk = Mock::mock(Talk::class);
        $this->talk->shouldReceive('sayHello')
            ->andReturn('Hello Paul');
        $person = new Person($this->talk);

        $this->assertEquals('Hello Paul', $person->greet('Paul'));
    }

    /**
     * Tear down the test.
     *
     * @return void
     */
    protected function tearDown()
    {
        Mock::close();
    }
}