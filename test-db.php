<?php
// Test database connection
require_once 'config/db.php';

try {
    // Test connection
    $stmt = $pdo->query("SELECT 1");
    echo "Database connection successful!<br>";

    // Check if tables exist
    $tables = ['users', 'photographers', 'clients', 'bookings', 'portfolios', 'payments', 'reviews'];
    foreach ($tables as $table) {
        $result = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($result->rowCount() > 0) {
            echo "Table '$table' exists.<br>";
        } else {
            echo "Table '$table' does not exist.<br>";
        }
    }

    // Check sample data
    $user_count = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    echo "Total users: $user_count<br>";

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
