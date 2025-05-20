<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Send a new message
    $data = json_decode(file_get_contents('php://input'), true);
    $sender_id = $data['sender_id'] ?? null;
    $receiver_id = $data['receiver_id'] ?? null;
    $message = $data['message'] ?? null;
    $is_encrypted = $data['is_encrypted'] ?? 0;

    if (!$sender_id || !$receiver_id || !$message) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('INSERT INTO messages (sender_id, receiver_id, message, is_encrypted) VALUES (?, ?, ?, ?)');
        $stmt->execute([$sender_id, $receiver_id, $message, $is_encrypted]);
        echo json_encode(['status' => 'Message sent']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to send message']);
    }
} elseif ($method === 'GET') {
    // Get messages between two users
    $user1 = $_GET['user1'] ?? null;
    $user2 = $_GET['user2'] ?? null;

    if (!$user1 || !$user2) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing user parameters']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp ASC');
        $stmt->execute([$user1, $user2, $user2, $user1]);
        $messages = $stmt->fetchAll();
        echo json_encode($messages);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch messages']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
