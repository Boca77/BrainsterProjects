<?php
include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$updateBook = $connection->prepare("UPDATE `books` 
SET title = :title, author_id = :author_id, `year` = :year, page_num = :page_num, img_url = :img_url, category_id = :category_id 
WHERE id = :id");
$updateBook->execute($_POST);

var_dump($_POST);

header('location: ../../index.php');
