<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../admin-panel.php?authorMsg=Re%20submit%20the%20form');
    return;
}

if (($_POST["first_name"] == "") || ($_POST["last_name"] == "") || ($_POST["biography"] == "")) {
    header('location: ../../admin-panel.php?authorMsg=All%20fields%20must%20be%20filled');
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
    if ($author['is_del'] == true) {
        $unDeleteAuthor = $connection->prepare("UPDATE `authors`
            SET is_del = 0
            WHERE id = :id");
        $unDeleteAuthor->bindParam('id', $author['id']);
        $unDeleteAuthor->execute();

        header('location: ../../admin-panel.php?authorMsg=Successfully%20added%20author');
        return;
    }
    header('location: ../../admin-panel.php?authorMsg=Author%20already%20added');
    return;
}

$insertAuthorQuery = "INSERT INTO `authors` (`first_name`,`last_name`,`biography`) VALUES (:first_name, :last_name, :biography)";
$insertAuthor = $connection->prepare($insertAuthorQuery);
$insertAuthor->execute($_POST);

$db->destroyConnection();

header('location: ../../admin-panel.php?authorMsg=Successfully%20added%20author');
