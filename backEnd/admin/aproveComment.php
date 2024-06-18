<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../index.php');
    return;
}

if (($_POST['comment_id'] === '')) {
    header('location: ../../index.php');
    return;
}

include(__DIR__ . "/../Connection.php");

use Connection\Connection;

$db = new Connection;
$connection = $db->getConnection();

$approveCom = $connection->prepare("UPDATE `comments`
            SET is_approved = 1
            WHERE id = :id");
$approveCom->bindParam("id", $_POST["comment_id"]);
$approveCom->execute();

header('location: ../../comment-panel.php');
