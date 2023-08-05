<?php
use Internal\Session;

view(
    'auth/signup.view.php',
    [
        'errors' => Session::getFlash('errors'),
        'exists' => Session::getFlash('errors')['exists'],
        'username' => Session::getFlash('old')['username'],
        'email' => Session::getFlash('old')['email']
    ]
);