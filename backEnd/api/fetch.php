<?php

use Connection\Connection;

require_once(__DIR__ . "/../Connection.php");


$db = new Connection();
$connection = $db->getConnection();

$query = "SELECT * FROM notes";
$result = $connection->prepare($query);
$result->execute();

if ($result) {
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    header("Content-Type: application/json");
    echo json_encode($data);
} else {
    header("Content-Type: application/json");
    echo json_encode(['error' => 'Failed to fetch notes']);
}
