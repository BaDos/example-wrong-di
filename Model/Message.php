<?php

namespace BaDos\ExampleWrongDi\Model;

/**
 * Model for emulating some model for DI
 */
class Message
{
    /**
     * @return string
     */
    public function getMessage()
    {
        return 'Hello World!';
    }
}
