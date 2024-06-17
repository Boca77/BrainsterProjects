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

$updateAuthor = $connection->prepare("UPDATE `authors` 
SET first_name = :first_name, last_name = :last_name, `biography` = :biography
WHERE id = :id");
$updateAuthor->execute($_POST);

header('location: ../../remove-edit.php?authorMsg=Successfully%20edited%20author');
