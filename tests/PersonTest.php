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
     * this test should fail.
     * Person should not be able to greet.
     */
    public function testGreetShouldFail()
    {
        $person = new Person();
        $this->assertNull($person->greet('Paul'));
    }

    /**
     * This test should pass
     * this person speaks French.
     */
    public function testGreetInFrenchShouldPass()
    {
        $this->talk = Mock::mock(Talk::class);
        $this->talk->shouldReceive('talkFrench')->withArgs(['Paul'])
            ->andReturn('Bonjour Paul!');
        $person = new Person($this->talk);

        $this->assertEquals(
            'Bonjour Paul!',
            $person->greet('Paul', Person::LANGUAGE_FRENCH)
        );
    }

    /**
     * this test should pass.
     * this person speaks Romanian.
     */
    public function testGreetInRomanianShouldPass()
    {
        $this->talk = Mock::mock(Talk::class);
        $this->talk->shouldReceive('talkRomanian')->withArgs(['Paul'])
            ->andReturn('Salut Paul!');
        $person = new Person($this->talk);

        $this->assertEquals(
            'Salut Paul!',
            $person->greet('Paul', Person::LANGUAGE_ROMANIAN)
        );
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