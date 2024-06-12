<?php
include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$getAuthor = $connection->prepare("SELECT `first_name`, `last_name` FROM `authors` WHERE `first_name` = :first_name AND `last_name` = :last_name");
$getAuthor->bindParam(':first_name', $_POST['first_name']);
$getAuthor->bindParam(':last_name', $_POST['last_name']);
$getAuthor->execute();
$author = $getAuthor->fetchAll(PDO::FETCH_ASSOC);

if ($author) {
    header('location: ../../admin-panel.php?authorMsg=Author%20already%20added');
    return;
}

$insertAuthorQuery = "INSERT INTO `authors` (`first_name`,`last_name`,`biography`) VALUES (:first_name, :last_name, :biography)";
$insertAuthor = $connection->prepare($insertAuthorQuery);
$insertAuthor->execute($_POST);

$db->destroyConnection();

header('location: ../../admin-panel.php?authorMsg=Successfully%20added%20author');
