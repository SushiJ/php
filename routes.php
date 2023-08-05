<?php

$router->get('/', 'index.php');
$router->get("/about", "about.php");
$router->get("/notes", "notes/index.php")->only('auth');
$router->get("/note", "notes/single.php")->only('auth');
$router->get("/notes/create", "notes/create.php")->only('auth');
$router->get("/notes/edit", "notes/edit.php")->only('auth');

$router->post("/notes", "notes/new.php")->only('auth');
$router->delete("/note", "notes/delete.php")->only('auth');
$router->patch("/notes/update", "notes/update.php")->only('auth');

$router->get("/signup", "signup.php")->only('guest');
$router->get("/signin", "signin.php")->only('guest');

$router->post("/signup", "auth/create.php")->only('guest');
$router->post("/signin", "auth/login.php")->only('guest');
$router->delete("/signout", "auth/signout.php")->only('auth');