<?php

namespace bigpaulie\jenkins;


class Talk
{

    /**
     * Say hello.
     *
     * @param string $name
     * @return string
     */
    public function sayHello($name)
    {
        return "Hello {$name}";
    }

    /**
     * this method will not be tested.
     *
     * @return string
     */
    public function talkFrench()
    {
        return "Bonjour !";
    }

    public function talkSpanish()
    {
        return "Hola !";
    }
}