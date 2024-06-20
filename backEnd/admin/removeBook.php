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
$getBook = $connection->prepare("DELETE FROM `books`
WHERE id = :id");
$getBook->bindParam(":id", $bookID);
$getBook->execute();

header('location: ../../remove-edit.php?bookMsg=Successfully%20deleted%20book');
