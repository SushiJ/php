<?php
use Internal\App;
use Internal\Container;
use Internal\Database;
use Internal\Validator;

$container = new Container();

$container->bind('Internal\Database', function () {
    $config = require withBasePath('config.php');
    return new Database($config);
});

$container->bind('Internal\Validator', function () {
    return new Validator();
});

App::setContainer($container);