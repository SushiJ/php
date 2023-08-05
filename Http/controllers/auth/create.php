<?php

use Http\Forms\RegisterForm;
use Internal\Registrar;
use Internal\Session;

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$form = new RegisterForm();

if ($form->isValid($email, $username, $password)) {
    $register = new Registrar();

    if ($register->attempt($email, $username, $password)) {
        Session::flash('success', 'Sign up successful, please sign in to continue');
        redirect("/signin");
    } else {
        $form->error('exists', 'Username / email already exists');
    }
}

Session::flash('errors', $form->errors());
Session::flash(
    'old',
    [
        'username' => $username,
        'email' => $email
    ]
);
redirect("/signup");