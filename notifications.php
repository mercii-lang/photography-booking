<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Create a new notification
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data['user_id'] ?? null;
    $message = $data['message'] ?? null;

    if (!$user_id || !$message) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('INSERT INTO notifications (user_id, message, is_read) VALUES (?, ?, 0)');
        $stmt->execute([$user_id, $message]);
        echo json_encode(['status' => 'Notification created']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to create notification']);
    }
} elseif ($method === 'GET') {
    // Get notifications for a user
    $user_id = $_GET['user_id'] ?? null;

    if (!$user_id) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing user_id']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$user_id]);
        $notifications = $stmt->fetchAll();
        echo json_encode($notifications);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch notifications']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
