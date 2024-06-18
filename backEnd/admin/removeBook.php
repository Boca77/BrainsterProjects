<?php
if ($_GET['bookId'] == '') {
    header('location: ../../remove-edit.php?bookMsg=Must%20select%20book');
    return;
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$bookID = $_GET['bookId'];
$getBook = $connection->prepare("UPDATE `books`
SET is_del = 1
WHERE id = :id");
$getBook->bindParam(":id", $bookID);
$getBook->execute();

$getBookComments = $connection->prepare("DELETE FROM `comments` WHERE book_id = :book_id");
$getBookComments->bindParam(":book_id", $bookID);
$getBookComments->execute();

header('location: ../../remove-edit.php?bookMsg=Successfully%20deleted%20book');
