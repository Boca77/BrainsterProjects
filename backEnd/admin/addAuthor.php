<?php
include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$getAuthor = $connection->prepare("SELECT `name`, `last_name` FROM `authors` WHERE `name` = :name AND `last_name` = :last_name");
$getAuthor->bindParam(':name', $_POST['name']);
$getAuthor->bindParam(':last_name', $_POST['last_name']);
$getAuthor->execute();
$author = $getAuthor->fetchAll(PDO::FETCH_ASSOC);

if ($author) {
    header('location: ../../admin-panel.php?authorMsg=Author%20already%20added');
    return;
}

$insertAuthorQuery = "INSERT INTO `authors` (`name`,`last_name`,`biography`) VALUES (:name, :last_name, :biography)";
$insertAuthor = $connection->prepare($insertAuthorQuery);
$insertAuthor->execute($_POST);

$db->destroyConnection();

header('location: ../../admin-panel.php?authorMsg=Successfully%20added%20author');
