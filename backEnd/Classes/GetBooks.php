<?php

namespace GetBooks;

require_once("./backEnd/Connection.php");

use Connection\Connection;

class GetBooks
{
    public $connection;
    public $books;

    public function __construct()
    {
        $db = new Connection();
        $this->connection = $db->getConnection();
    }

    public function getBooks()
    {
        $this->books = $this->connection->prepare("SELECT *, 
            books.id AS book_id
        FROM 
            books 
        JOIN 
            authors ON books.author_id = authors.id 
        JOIN 
            category ON books.category_id = category.id
        WHERE 
            books.is_del = 0 AND authors.is_del = 0 AND category.is_del = 0");
        $this->books->execute();

        return $this->books->fetchAll(\PDO::FETCH_ASSOC);
    }
}
