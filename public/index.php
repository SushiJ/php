<?php

// TODO: Do some forms with exception handling

use Internal\Session;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'vendor/autoload.php';

session_start();

require BASE_PATH . "Internal/functions.php";


require withBasePath("bootstrap.php");

$router = new \Internal\Router();
$routes = require withBasePath('routes.php');

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
