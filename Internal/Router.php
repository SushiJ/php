<?php

namespace Internal;

use Internal\Middleware\Auth;
use Internal\Middleware\Guest;
use Internal\Middleware\Middleware;

class Router
{
    protected $routes = [];

    private function handler($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->handler('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->handler('POST', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->handler('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        return $this->handler('PATCH', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->handler('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);
                return require withBasePath('Http/controllers/' . $route['controller']);
            }
        }
        abort();
    }

}