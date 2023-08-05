<?php

namespace Internal;

class Validator
{
    public static function isNull($value)
    {
        return strlen(trim($value)) === 0;
    }

    public static function isLongerThan($value, $amount)
    {
        return strlen($value) > $amount;
    }
    public static function isShorterThan($value, $amount)
    {
        return strlen($value) < $amount;
    }
}