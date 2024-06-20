<?php

use Connection\Connection;

require_once(__DIR__ . "/../Connection.php");

header("Content-Type: application/json");

if (empty($message) || empty($user_id) || empty($book_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

$message = $input['message'] ?? '';
$user_id = $input['user_id'] ?? '';
$book_id = $input['book_id'] ?? '';

$db = new Connection();
$connection = $db->getConnection();

if ($message && $user_id && $book_id) {
    $query = $connection->prepare("INSERT INTO notes (text, user_id, book_id) VALUES (:text, :user_id, :book_id)");

    $query->execute(['text' => $message, 'user_id' => $user_id, 'book_id' => $book_id]);

    echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
