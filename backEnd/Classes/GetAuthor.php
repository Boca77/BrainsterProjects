<?php

namespace GetAuthor;

require_once("./backEnd/Connection.php");

use Connection\Connection;

class GetAuthor
{
    public $connection;
    public $author;

    public function __construct()
    {
        $db = new Connection();
        $this->connection = $db->getConnection();
    }

    public function getAuthor()
    {
        $this->author = $this->connection->prepare("SELECT * FROM `authors` WHERE is_del = 0");
        $this->author->execute();
        return $this->author->fetchAll(\PDO::FETCH_ASSOC);
    }
}
