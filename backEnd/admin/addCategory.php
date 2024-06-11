<?php
include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();


$getCategory = $connection->prepare("SELECT `name` FROM `category` WHERE `name` = :category");
$getCategory->bindParam(':category', $_POST['category']);
$getCategory->execute();
$category = $getCategory->fetchAll(PDO::FETCH_ASSOC);

if ($category) {
    header('location: ../../admin-panel.php?catMsg=Category%20already%20added');
    return;
}

$categoryInsertQuery = "INSERT INTO `category` (`name`) VALUE (:category)";
$categoryInsert = $connection->prepare($categoryInsertQuery);
$categoryInsert->execute($_POST);

header('location: ../../admin-panel.php?catMsg=Successfully%20added%20category');
