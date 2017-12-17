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
}