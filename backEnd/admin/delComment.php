<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../index.php');
    return;
}

if (($_POST['comment_id'] == '') || ($_POST['book_id'] == '')) {
    header('location: ../../index.php');
    return;
}

require_once(__DIR__ . "/../Connection.php");

use Connection\Connection;

$db = new Connection;
$connection = $db->getConnection();

$delCom = $connection->prepare("DELETE FROM `comments` WHERE id = :id");
$delCom->bindParam("id", $_POST['comment_id']);
$delCom->execute();

var_dump($_POST);

header("location: ../../book.php?id={$_POST['book_id']}");
