<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header('location: ../../admin-panel.php?bookMsg=Re%20submit%20the%20form');
    return;
}

if (($_POST["title"] == "") || ($_POST["img_url"] == "") || ($_POST["page_num"] == "") || ($_POST["category_id"] == "") || ($_POST["year"] == "") || ($_POST["author_id"] == "")) {
    header('location: ../../admin-panel.php?bookMsg=All%20fields%20must%20be%20filled');
    return;
}

session_start();


include("../Classes/GetAuthor.php");
include("../Classes/GetCategory.php");

use GetAuthor\GetAuthor;
use GetCategory\GetCategory;

$checkAuthorId = new GetAuthor();
$checkAuthor = $checkAuthorId->getAuthorByID($_POST['author_id']);

$checkCategoryId = new GetCategory();
$checkCategory = $checkCategoryId->getCategoryByID($_POST['category_id']);

if (!$checkAuthor) {

    header('location: ../../admin-panel.php?bookMsg=Author%20Id%20not%20valid');
    return;
}

if (!$checkCategory) {
    header('location: ../../admin-panel.php?bookMsg=Category%20Id%20not%20valid');
    return;
}

$fetchBook = $connection->prepare('SELECT * FROM `books` WHERE title = :title AND author_id = :author_id');
$fetchBook->bindParam("title", $_POST['title']);
$fetchBook->bindParam("author_id", $_POST['author_id']);
$fetchBook->execute();
$book = $fetchBook->fetch(PDO::FETCH_ASSOC);

if ($book) {
    header('location: ../../admin-panel.php?bookMsg=Book%20already%20added');
    return;
}

$addBookQuery = 'INSERT INTO `books` (`title`, `img_url`, `page_num`, `category_id`, `year`, `author_id`) 
VALUES (:title, :img_url, :page_num, :category_id, :year, :author_id)';
$addBook = $connection->prepare($addBookQuery);
$addBook->execute($_POST);

header('location: ../../admin-panel.php?bookMsg=Book%20successfully%20added');
