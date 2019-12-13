<?php

namespace Database;

use Database\Connection;
use PDO;

class Query
{
    public function query (string $sql, array $param = [])
    {
        $connection = new Connection();
        $connection = $connection->get();
        $result = $connection->prepare($sql);
        $result->execute($param);
        return $result;
    }

    public function getAll(string $sql, array $param = [])
    {
        $stmt = $this->query($sql, $param);
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;  
    }
}
