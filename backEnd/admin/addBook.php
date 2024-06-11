<?php
session_start();

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$fetchBook = $connection->prepare('SELECT * FROM `books` WHERE title = :title AND author_id = :author_id');
$fetchBook->bindParam("title", $_POST['title']);
$fetchBook->bindParam("author_id", $_POST['author_id']);
$fetchBook->execute();
$book = $fetchBook->fetch(PDO::FETCH_ASSOC);

if ($book) {
    header('location: ../../admin-panel.php?bookMsg=Book%20already%20added');
    return;
}
$addBookQuery = 'INSERT INTO `books` (`title`, `img_url`, `page_num`, `category_id`, `year`, `author_id`) 
VALUES (:title, :img_url, :page_num, :category_id, :year, :author_id)';
$addBook = $connection->prepare($addBookQuery);
$addBook->execute($_POST);

header('location: ../../admin-panel.php?bookMsg=Book%20successfully%20added');
