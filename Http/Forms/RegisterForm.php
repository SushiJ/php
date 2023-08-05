<?php

namespace Http\Forms;

use Internal\Validator;

class RegisterForm
{
    private $errors = [];
    public function isValid($email, $username, $password)
    {
        if (Validator::isNull($email)) {
            $this->errors['email'] = "Please provide an email";
        }
        if (Validator::isNull($username)) {
            $this->errors['username'] = "Please provide an username";
        }

        if (Validator::isNull($password)) {
            $this->errors['password'] = "Please provide a password";
        }
        if (Validator::isShorterThan($password, 7)) {
            $this->errors['password'] = "Password must be greater than 7 characters";
        }
        if (Validator::isLongerThan($password, 255)) {
            $this->errors['password'] = "Password can't be more than 255 characters";
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
    public function error($field, $msg)
    {
        $this->errors[$field] = $msg;
    }
}