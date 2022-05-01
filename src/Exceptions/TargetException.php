<?php

namespace Katas\Exceptions;

use Exception;

class TargetException extends Exception
{
    public static function doesNotExists(): self
    {
        return new static('The target value does not exists in the array');
    }

    public static function undefinedIndex(): self
    {
        return new static('Undefined index');
    }
}
