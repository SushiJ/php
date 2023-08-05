<?php

namespace Internal;

use Internal\Database;
use Internal\Session;


class Authenticator
{
    public function attempt($username, $password)
    {
        $db = App::container()->resolve(Database::class);

        $user = $db->query(
            "SELECT * FROM users where username = :username",
            [
                'username' => $username
            ]
        )->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }
        return false;
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'username' => $user['username'],
            'user_id' => $user['id']
        ];
        session_regenerate_id(true);
    }
    public static function logout()
    {
        Session::destroy();
        redirect("/signin");
    }
}