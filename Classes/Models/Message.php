<?php
namespace Models;

use Database\Query;

class Message
{
    public function get()
    {
        $query = new Query();
        $sql = "SELECT * FROM `messages` LIMIT 50";
        $array = $query->getAll($sql);
        return $array;
    }
}
