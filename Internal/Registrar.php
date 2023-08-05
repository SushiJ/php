<?php

namespace Internal;

use Internal\Database;


class Registrar
{
    public function attempt($email, $username, $password)
    {
        $db = App::container()->resolve(Database::class);

        $user = $db->query(
            "SELECT * FROM users where username = :username",
            [
                'username' => $username
            ]
        )->fetch();

        if (!$user['email_id'] && !$user['username']) {
            $db->query(
                "INSERT INTO users (username, email_id, password) VALUES (:username, :email, :password)",
                [
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT)
                ]
            );
            return true;
        }
        return false;
    }
}