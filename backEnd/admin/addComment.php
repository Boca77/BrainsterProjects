<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../index.php');
    return;
}

if (($_POST['comment'] == '') || ($_POST['user'] == '') || ($_POST['book'] == '')) {
    header('location: ../../index.php');
    return;
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();


$setComment = $connection->prepare("INSERT INTO `comments` (`text`, `user_id`, `book_id`) VALUES (:comment, :user, :book)");
$setComment->execute($_POST);

header("location: ../../book.php?id={$_POST['book']}");

var_dump($_POST);