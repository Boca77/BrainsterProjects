<?php

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

var_dump($_POST);

$updateCategory = $connection->prepare("UPDATE `category` 
SET name = :category
WHERE id = :id");
$updateCategory->execute($_POST);

header('location: ../../index.php');
