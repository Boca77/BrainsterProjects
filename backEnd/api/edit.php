<?php

use Connection\Connection;

require_once(__DIR__ . "/../Connection.php");

header("Content-Type: application/json");

$input = json_decode(file_get_contents('php://input'), true);

$message = $input['message'] ?? '';
$user_id = $input['user_id'] ?? '';
$book_id = $input['book_id'] ?? '';
$note_id = $_GET['id'] ?? null;

$db = new Connection();
$connection = $db->getConnection();

if (!$message || !$user_id || !$book_id || !$note_id) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    return;
}

$query = "UPDATE notes SET text = :text WHERE id = :note_id AND user_id = :user_id AND book_id = :book_id";
$stmt = $connection->prepare($query);
$stmt->execute(['text' => $message, 'note_id' => $note_id, 'user_id' => $user_id, 'book_id' => $book_id]);


if ($message) {
    echo json_encode(['status' => 'success', 'message' => 'Note updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update note']);
}
