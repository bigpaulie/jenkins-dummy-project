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
     * Person speaks Romanian.
     *
     * @var string
     */
    const LANGUAGE_ROMANIAN = 'romanian';

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

    /**
     * Greet other persons.
     *
     * @param string $name
     * @param string $language
     * @return null|string
     */
    public function greet($name, $language = self::LANGUAGE_ENGLISH)
    {
        if ( $this->talk ) {
            switch ($language) {
                case Person::LANGUAGE_ENGLISH;
                    return $this->talk->sayHello($name);
                case Person::LANGUAGE_FRENCH:
                    return $this->talk->talkFrench($name);
                case Person::LANGUAGE_ROMANIAN:
                    return $this->talk->talkRomanian($name);
                default:
                    return $this->talk->sayHello($name);
            }
        }

        return null;
    }
}