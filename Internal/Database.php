<?php

namespace Internal;

use PDO;

class Database
{
    public $connection;

    public $stmt;

    public function __construct($config, $username = 'root', $password = 'mysql')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = null)
    {
        $this->stmt = $this->connection->prepare($query);

        $this->stmt->execute($params);

        return $this;
    }

    public function fetch()
    {
        return $this->stmt->fetch();
    }

    public function fetchOrFail()
    {
        $result = $this->fetch();
        if (!$result) {
            $this->abort();
        }
        return $result;

    }

    public function fetchAll()
    {
        return $this->stmt->fetchAll();
    }

    private function abort($code = 404)
    {
        http_response_code($code);
        require withBasePath("views/{$code}.php");
        die();
    }
}
;