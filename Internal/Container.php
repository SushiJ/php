<?php

namespace Internal;

class Container
{
    private $bindings = [];
    public function bind($key, $cb)
    {
        $this->bindings[$key] = $cb;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding for the {$key}");
        }

        $cb = $this->bindings[$key];
        return call_user_func($cb);
    }
}