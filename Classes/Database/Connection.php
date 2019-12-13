<?php

namespace Database;

use PDO;

class Connection
{
    private $connection;
    
    public function __construct()
    {
        try {
        $this->connection = new PDO('mysql:host=127.0.0.1;port=3306;dbname=db_feedback;charset=utf8', 'admin', 
        '10BA');
        }  catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function get()
    {
        return $this->connection;
    }
}
