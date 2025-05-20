<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Create a new booking
    $data = json_decode(file_get_contents('php://input'), true);
    $client_id = $data['client_id'] ?? null;
    $photographer_id = $data['photographer_id'] ?? null;
    $booking_date = $data['booking_date'] ?? null;
    $time_slot = $data['time_slot'] ?? null;
    $location = $data['location'] ?? null;

    if (!$client_id || !$photographer_id || !$booking_date) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('INSERT INTO bookings (client_id, photographer_id, booking_date, time_slot, location, status) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$client_id, $photographer_id, $booking_date, $time_slot, $location, 'pending']);
        echo json_encode(['status' => 'Booking created']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to create booking']);
    }
} elseif ($method === 'GET') {
    // Get bookings for a client or photographer
    $user_id = $_GET['user_id'] ?? null;
    $role = $_GET['role'] ?? null;

    if (!$user_id || !$role) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing user_id or role']);
        exit;
    }

    try {
        if ($role === 'client') {
            $stmt = $pdo->prepare('SELECT * FROM bookings WHERE client_id = ?');
        } elseif ($role === 'photographer') {
            $stmt = $pdo->prepare('SELECT * FROM bookings WHERE photographer_id = ?');
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid role']);
            exit;
        }
        $stmt->execute([$user_id]);
        $bookings = $stmt->fetchAll();
        echo json_encode($bookings);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch bookings']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
