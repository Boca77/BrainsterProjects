<?php

namespace GetBooks;

require_once(__DIR__ . "/../Connection.php");

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
            authors.is_del = 0 AND category.is_del = 0");
        $this->books->execute();

        return $this->books->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBookByID($id)
    {
        $this->books = $this->connection->prepare(" SELECT 
            *, 
            books.id AS book_id, 
            authors.id AS author_id, 
            category.id AS category_id
        FROM 
            books 
        JOIN 
            authors ON books.author_id = authors.id 
        JOIN 
            category ON books.category_id = category.id
        WHERE 
            authors.is_del = 0 
            AND category.is_del = 0 
            AND books.id = :id");
        $this->books->bindParam("id", $id);
        $this->books->execute();

        return $this->books->fetch(\PDO::FETCH_ASSOC);
    }
}
