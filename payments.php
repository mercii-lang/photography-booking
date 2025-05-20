<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Record a new payment
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data['user_id'] ?? null;
    $payment_type = $data['payment_type'] ?? null;
    $amount = $data['amount'] ?? null;
    $mpesa_code = $data['mpesa_code'] ?? null;
    $status = $data['status'] ?? 'pending';

    if (!$user_id || !$payment_type || !$amount) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('INSERT INTO payments (user_id, payment_type, amount, mpesa_code, status) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$user_id, $payment_type, $amount, $mpesa_code, $status]);
        echo json_encode(['status' => 'Payment recorded']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to record payment']);
    }
} elseif ($method === 'GET') {
    // Get payments for a user
    $user_id = $_GET['user_id'] ?? null;

    if (!$user_id) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing user_id']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('SELECT * FROM payments WHERE user_id = ?');
        $stmt->execute([$user_id]);
        $payments = $stmt->fetchAll();
        echo json_encode($payments);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch payments']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
