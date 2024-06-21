<?php

use Connection\Connection;

require_once(__DIR__ . "/../Connection.php");

header("Content-Type: application/json");

$note_id = $_GET['id'] ?? null;

$db = new Connection();
$connection = $db->getConnection();

if (!$note_id) {
    echo json_encode(['status' => 'error', 'message' => 'Missing note ID']);
    return;
}

$query = "DELETE FROM notes WHERE id = :note_id";
$stmt = $connection->prepare($query);
$stmt->execute(['note_id' => $note_id]);

if ($stmt->rowCount() > 0) {
    echo json_encode(['status' => 'success', 'message' => 'Note deleted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete note']);
}
