<?php
// Database connection configuration

$host = 'localhost';
$dbname = 'photography_booking';
$username = 'root';
$password = ''; // Update with your MySQL root password if any

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
