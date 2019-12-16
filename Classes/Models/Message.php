<?php
namespace Models;

use Database\Query;

class Message
{
    public function get()
    {
        $query = new Query();
        $sql = "SELECT * FROM `messages`";
        $array = $query->getAll($sql);
        return $array;
    }
    public function send(string $name, string $mail, string $message)
    {
        $query = new Query();
        $sql = "INSERT INTO messages (name, mail, message) VALUES ('$name', '$mail', '$message')";
        $query->query($sql);
        return true;
    }
}
