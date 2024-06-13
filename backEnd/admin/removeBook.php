<?php
if ($_POST["action"] == 'Edit') {
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$bookID = $_POST['book_id'];
$getBook = $connection->prepare("UPDATE `books`
SET is_del = 1
WHERE id = :id");
$getBook->bindParam(":id", $bookID);
$getBook->execute();

header('location: ../../remove-edit.php?bookMsg=Successfully%20deleted%20book');
