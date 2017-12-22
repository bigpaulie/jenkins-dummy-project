<?php

namespace bigpaulie\jenkins;

/**
 * Class Person
 * @package bigpaulie\jenkins
 */
class Person
{

    /**
     * Person speaks French.
     *
     * @var string
     */
    const LANGUAGE_FRENCH = 'french';

    /**
     * Person speaks English.
     *
     * @var string
     */
    const LANGUAGE_ENGLISH = 'english';

    /**
     * Person speaks Italian.
     *
     * @var string
     */
    const LANGUAGE_ITALIAN = 'italian';

    /**
     * @var Talk $talk
     */
    private $talk;

    /**
     * Person constructor.
     * @param Talk $talk
     */
    public function __construct(Talk $talk = null)
    {
        $this->talk = $talk;
    }

    public function greet($name, $language = self::LANGUAGE_ENGLISH)
    {
        if ( $this->talk ) {
            return $this->talk->sayHello($name);
        }

        return null;
    }
}