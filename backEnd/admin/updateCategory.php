<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../remove-edit.php?catMsg=Re%20submit%20the%20form');
    return;
}

if (($_POST["category"] == "") || ($_POST["id"] == '')) {
    header('location: ../../remove-edit.php?catMsg=All%20fields%20must%20be%20filled');
    return;
}

var_dump($_POST);

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$updateCategory = $connection->prepare("UPDATE `category` 
SET name = :category
WHERE id = :id");
$updateCategory->execute($_POST);

header('location: ../../remove-edit.php?catMsg=Successfully%20edited%20category');
