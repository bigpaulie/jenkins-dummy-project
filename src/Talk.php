<?php

namespace bigpaulie\jenkins;

/**
 * Class Talk
 * @package bigpaulie\jenkins
 */
class Talk
{

    /**
     * Say hello.
     *
     * @param  string $name
     *
     * @return string
     */
    public function sayHello($name)
    {
        return "Hello {$name}";
    }

    /**
     * Talk French
     *
     * @param string $name
     * @return string
     */
    public function talkFrench($name)
    {
        return "Bonjour {$name}!";
    }

    /**
     * Talk Spanish.
     *
     * @return string
     */
    public function talkSpanish()
    {
        return "Hola !";
    }

    /**
     * Talk Italian.
     *
     * @return string
     */
    public function talkItalian()
    {
        return "Ciao !";
    }

    /**
     * Talk Romanian.
     *
     * @return string
     */
    public function talkRomanian($name)
    {
        return "Salut {$name}!";
    }
}