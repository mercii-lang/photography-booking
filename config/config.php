<?php
// config.php
// Secure connection to MySQL database using PDO

$host = 'localhost';         // or your DB server IP (e.g. 127.0.0.1)
$db   = 'photographyplatform';      // your database name
$user = 'root';              // your database username
$pass = '';                  // your database password
$charset = 'utf8mb4';        // ensures full Unicode support

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // throw exceptions on error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // fetch data as associative array
    PDO::ATTR_EMULATE_PREPARES   => false,                   // use native prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Database connection successful"; // Uncomment to test connection
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
