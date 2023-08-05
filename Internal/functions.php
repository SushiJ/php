<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function withBasePath($path)
{
    return BASE_PATH . $path;
}
;

function view($path, $args = [])
{
    extract($args);

    require withBasePath('views/' . $path);
}
function uriIs($path)
{
    $uri = parse_url($_SERVER["REQUEST_URI"])['path'];
    return $uri === $path;
}
;

function abort($code = 404)
{
    http_response_code($code);
    require withBasePath("views/{$code}.php");
    die();
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}