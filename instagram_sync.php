<?php
require '../config/db.php';
$accessToken = $_GET['token'];
$userId = $_GET['user'];
$url = "https://graph.instagram.com/$userId/media?fields=id,media_url,caption&access_token=$accessToken";
$response = file_get_contents($url);
$data = json_decode($response, true);
foreach ($data['data'] as $item) {
  $sql = "INSERT INTO portfolios (photographer_id, image_url, caption) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iss", $userId, $item['media_url'], $item['caption']);
  $stmt->execute();
}
echo json_encode(['status' => 'success']);
?>