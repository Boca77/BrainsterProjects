<?php

include("../Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$updateAuthor = $connection->prepare("UPDATE `authors` 
SET first_name = :first_name, last_name = :last_name, `biography` = :biography
WHERE id = :id");
$updateAuthor->execute($_POST);

header('location: ../../index.php');
