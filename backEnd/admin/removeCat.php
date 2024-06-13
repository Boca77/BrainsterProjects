<?php
if ($_POST["action"] == 'Edit') {
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$catID = $_POST['cat_id'];
$getBook = $connection->prepare("UPDATE `category`
SET is_del = 1
WHERE id = :id");
$getBook->bindParam(":id", $catID);
$getBook->execute();

header('location: ../../remove-edit.php?catMsg=Successfully%20deleted%20category');
