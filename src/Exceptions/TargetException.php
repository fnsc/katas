<?php

namespace Fnsc\Katas\Exceptions;

use Exception;

class TargetException extends Exception
{
    public static function doesNotExists(): self
    {
        return new static('The target value does not exists in the array');
    }
}