<?php

namespace Internal;
class App 
{
    private static $container;
    public static function setContainer($container)
    {
        static::$container = $container;
    }
    public static function container()
    {
        return static::$container;
    }
}