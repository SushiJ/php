<?php

use Internal\Authenticator;
use Http\Forms\LoginForm;
use Internal\Session;

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$form = new LoginForm();

if ($form->isValid($username, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($username, $password)) {
        redirect("/");
    }
    $form->error('invalid', 'Invalid username or password');
}

Session::flash('errors', $form->errors());
Session::flash(
    'old',
    [
        'username' => $username
    ]
);

redirect('/signin');