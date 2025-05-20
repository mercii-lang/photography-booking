<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Upload a new portfolio image
    $data = json_decode(file_get_contents('php://input'), true);
    $photographer_id = $data['photographer_id'] ?? null;
    $image_url = $data['image_url'] ?? null;
    $source = $data['source'] ?? 'manual';

    if (!$photographer_id || !$image_url) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('INSERT INTO portfolio_images (photographer_id, image_url, source) VALUES (?, ?, ?)');
        $stmt->execute([$photographer_id, $image_url, $source]);
        echo json_encode(['status' => 'Portfolio image added']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to add portfolio image']);
    }
} elseif ($method === 'GET') {
    // Get portfolio images for a photographer
    $photographer_id = $_GET['photographer_id'] ?? null;

    if (!$photographer_id) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing photographer_id']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('SELECT * FROM portfolio_images WHERE photographer_id = ? ORDER BY created_at DESC');
        $stmt->execute([$photographer_id]);
        $images = $stmt->fetchAll();
        echo json_encode($images);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch portfolio images']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
