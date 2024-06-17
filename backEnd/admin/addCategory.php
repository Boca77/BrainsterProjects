<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../admin-panel.php?catMsg=Re%20submit%20the%20form');
    return;
}

if (($_POST["name"] == "")) {
    header('location: ../../admin-panel.php?catMsg=All%20fields%20must%20be%20filled');
    return;
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();


$getCategory = $connection->prepare("SELECT * FROM `category` WHERE `name` = :category");
$getCategory->bindParam(':category', $_POST['category']);
$getCategory->execute();
$category = $getCategory->fetch(PDO::FETCH_ASSOC);

if ($category) {
    if ($category['is_del'] == true) {
        $unDeleteCat = $connection->prepare("UPDATE `category`
            SET is_del = 0
            WHERE id = :id");
        $unDeleteCat->bindParam('id', $category['id']);
        $unDeleteCat->execute();

        header('location: ../../admin-panel.php?catMsg=Successfully%20added%20category');
        return;
    }
    header('location: ../../admin-panel.php?catMsg=Category%20already%20added');
    return;
}

$categoryInsertQuery = "INSERT INTO `category` (`name`) VALUE (:category)";
$categoryInsert = $connection->prepare($categoryInsertQuery);
$categoryInsert->execute($_POST);

header('location: ../../admin-panel.php?catMsg=Successfully%20added%20category');
