<?php
// API Router for Photography Booking System
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

require_once '../config/db.php';

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$endpoint = $request[2] ?? ''; // Assuming /photography-booking/public/api/endpoint

switch ($endpoint) {
    case 'photographers':
        handlePhotographers($method, $pdo);
        break;
    case 'bookings':
        handleBookings($method, $pdo);
        break;
    case 'users':
        handleUsers($method, $pdo);
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}

function handlePhotographers($method, $pdo) {
    switch ($method) {
        case 'GET':
            // Get all photographers or search
            $query = "SELECT p.*, u.first_name, u.last_name, u.email
                     FROM photographers p
                     JOIN users u ON p.user_id = u.id
                     WHERE p.is_available = 1";
            $params = [];

            // Add search filters
            if (isset($_GET['location'])) {
                $query .= " AND p.location LIKE ?";
                $params[] = '%' . $_GET['location'] . '%';
            }
            if (isset($_GET['specialty'])) {
                $query .= " AND p.specialties LIKE ?";
                $params[] = '%' . $_GET['specialty'] . '%';
            }
            if (isset($_GET['min_rate'])) {
                $query .= " AND p.hourly_rate >= ?";
                $params[] = $_GET['min_rate'];
            }
            if (isset($_GET['max_rate'])) {
                $query .= " AND p.hourly_rate <= ?";
                $params[] = $_GET['max_rate'];
            }

            $stmt = $pdo->prepare($query);
            $stmt->execute($params);
            $photographers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($photographers);
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            break;
    }
}

function handleBookings($method, $pdo) {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized']);
        return;
    }

    switch ($method) {
        case 'GET':
            // Get user's bookings
            $query = "SELECT b.*, p.first_name as photographer_first, p.last_name as photographer_last,
                             u.first_name as client_first, u.last_name as client_last
                     FROM bookings b
                     JOIN photographers ph ON b.photographer_id = ph.id
                     JOIN users p ON ph.user_id = p.id
                     JOIN clients c ON b.client_id = c.id
                     JOIN users u ON c.user_id = u.id
                     WHERE b.client_id = ? OR ph.user_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
            $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($bookings);
            break;

        case 'POST':
            // Create new booking
            $data = json_decode(file_get_contents('php://input'), true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid JSON data']);
                return;
            }

            // Get client_id from user_id
            $stmt = $pdo->prepare("SELECT id FROM clients WHERE user_id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $client = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$client) {
                http_response_code(400);
                echo json_encode(['error' => 'Client profile not found']);
                return;
            }

            $stmt = $pdo->prepare("INSERT INTO bookings (client_id, photographer_id, event_type, event_date, event_time, location, budget, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $client['id'],
                $data['photographer_id'],
                $data['event_type'],
                $data['event_date'],
                $data['event_time'] ?? null,
                $data['location'],
                $data['budget'] ?? null,
                $data['description']
            ]);

            echo json_encode(['success' => true, 'booking_id' => $pdo->lastInsertId()]);
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            break;
    }
}

function handleUsers($method, $pdo) {
    switch ($method) {
        case 'POST':
            // User registration
            $data = json_decode(file_get_contents('php://input'), true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid JSON data']);
                return;
            }

            // Validate required fields
            $required = ['email', 'password', 'first_name', 'last_name', 'role'];
            foreach ($required as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    http_response_code(400);
                    echo json_encode(['error' => "Missing required field: $field"]);
                    return;
                }
            }

            // Check if email exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$data['email']]);
            if ($stmt->fetch()) {
                http_response_code(409);
                echo json_encode(['error' => 'Email already registered']);
                return;
            }

            // Hash password
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            // Insert user
            $stmt = $pdo->prepare("INSERT INTO users (email, password, role, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$data['email'], $hashed_password, $data['role'], $data['first_name'], $data['last_name']]);

            $user_id = $pdo->lastInsertId();

            // Insert into role-specific table
            if ($data['role'] === 'client') {
                $stmt = $pdo->prepare("INSERT INTO clients (user_id) VALUES (?)");
                $stmt->execute([$user_id]);
            } elseif ($data['role'] === 'photographer') {
                $stmt = $pdo->prepare("INSERT INTO photographers (user_id) VALUES (?)");
                $stmt->execute([$user_id]);
            }

            echo json_encode(['success' => true, 'user_id' => $user_id]);
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            break;
    }
}
?>
