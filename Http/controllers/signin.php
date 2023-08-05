<?php
use Internal\Session;

view(
    'auth/signin.view.php',
    [
        'exists' => Session::getFlash('errors')['exists'],
        'invalid' => Session::getFlash('errors')['invalid'],
        'success' => Session::getFlash('success'),
        'username' => Session::getFlash('old')['username']
    ]
);