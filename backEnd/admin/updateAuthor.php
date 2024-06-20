<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../remove-edit.php?authorMsg=All%20fields%20must%20be%20filled');
    return;
}

if (($_POST["id"] == "") || ($_POST["first_name"] == "") || ($_POST["last_name"] == "") || ($_POST["biography"] == "")) {
    header('location: ../../remove-edit.php?authorMsg=All%20fields%20must%20be%20filled');
    return;
}
include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$getAuthor = $connection->prepare("SELECT `first_name`, `last_name` FROM `authors` WHERE `first_name` = :first_name AND `last_name` = :last_name");
$getAuthor->bindParam(':first_name', $_POST['first_name']);
$getAuthor->bindParam(':last_name', $_POST['last_name']);
$getAuthor->execute();
$author = $getAuthor->fetch(PDO::FETCH_ASSOC);

if ($author) {
    header('location: ../../remove-edit.php?authorMsg=Author%20already%20exists');
    return;
}

$updateAuthor = $connection->prepare("UPDATE `authors` 
SET first_name = :first_name, last_name = :last_name, `biography` = :biography
WHERE id = :id");
$updateAuthor->execute($_POST);

header('location: ../../remove-edit.php?authorMsg=Successfully%20edited%20author');
