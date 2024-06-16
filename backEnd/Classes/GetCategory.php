<?php

namespace GetCategory;

require_once("./backEnd/Connection.php");

use Connection\Connection;

class GetCategory
{
    public $connection;
    public $category;

    public function __construct()
    {
        $db = new Connection();
        $this->connection = $db->getConnection();
    }

    public function getCategory()
    {
        $this->category = $this->connection->prepare("SELECT * FROM `category` WHERE is_del = 0");
        $this->category->execute();
        return $this->category->fetchAll(\PDO::FETCH_ASSOC);
    }
}
