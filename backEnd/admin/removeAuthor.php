<?php
if ($_GET['author_id'] == '') {
    header('location: ../../remove-edit.php?authorMsg=Must%20select%20author');
    return;
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$authorID = $_GET['author_id'];
$getBook = $connection->prepare("UPDATE `authors`
SET is_del = 1
WHERE id = :id");
$getBook->bindParam(":id", $authorID);
$getBook->execute();

header('location: ../../remove-edit.php?authorMsg=Successfully%20deleted%20author');
