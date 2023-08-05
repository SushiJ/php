<?php

namespace Http\Forms;

use Internal\Validator;

class LoginForm
{
    private $errors = [];
    public function isValid($username, $password)
    {
        if (Validator::isNull($username)) {
            $this->errors['username'] = "Please provide an username";
        }

        if (Validator::isNull($password)) {
            $this->errors['password'] = "Please provide an password";
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $msg) {
        $this->errors[$field] = $msg;
    }
}