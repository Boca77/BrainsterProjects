<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../remove-edit.php?bookMsg=Re%20submit%20the%20form');
    return;
}

if (($_POST["id"] == "") || ($_POST["title"] == "") || ($_POST["img_url"] == "") || ($_POST["page_num"] == "") || ($_POST["category_id"] == "") || ($_POST["year"] == "") || ($_POST["author_id"] == "")) {
    header('location: ../../remove-edit.php?bookMsg=All%20fields%20must%20be%20filled');
    return;
}

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$fetchBook = $connection->prepare('SELECT * FROM `books` WHERE title = :title AND author_id = :author_id');
$fetchBook->bindParam("title", $_POST['title']);
$fetchBook->bindParam("author_id", $_POST['author_id']);
$fetchBook->execute();
$book = $fetchBook->fetch(PDO::FETCH_ASSOC);

if ($book) {
    header('location: ../../remove-edit.php?bookMsg=bookMsg=Book%20already%20exists');
    return;
}

$updateBook = $connection->prepare("UPDATE `books` 
SET title = :title, author_id = :author_id, `year` = :year, page_num = :page_num, img_url = :img_url, category_id = :category_id 
WHERE id = :id");
$updateBook->execute($_POST);

var_dump($_POST);

header('location: ../../remove-edit.php?bookMsg=Successfully%20edited%20book');
