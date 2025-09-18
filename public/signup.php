<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || empty($role)) {
        $error = 'Please fill in all fields';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } elseif (!in_array($role, ['client', 'photographer'])) {
        $error = 'Invalid role selected';
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Email already registered';
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $pdo->prepare("INSERT INTO users (email, password, role, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$email, $hashed_password, $role, $first_name, $last_name]);

            $user_id = $pdo->lastInsertId();

            // Insert into clients or photographers table
            if ($role === 'client') {
                $stmt = $pdo->prepare("INSERT INTO clients (user_id) VALUES (?)");
                $stmt->execute([$user_id]);
            } elseif ($role === 'photographer') {
                $stmt = $pdo->prepare("INSERT INTO photographers (user_id) VALUES (?)");
                $stmt->execute([$user_id]);
            }

            $success = 'Registration successful! You can now <a href="?page=login">login</a>.';
        }
    }
}
?>

<div class="min-h-[calc(100vh-5rem)] flex items-center justify-center p-4 bg-gray-50">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-camera text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Create Your Account</h1>
            <p class="text-gray-600">Sign up to start booking or showcasing your photography</p>
        </div>

        <?php if ($error): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <?php if ($success): ?>
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-6">
            <?php echo $success; ?>
        </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="First name"
                    />
                </div>
                <div class="flex-1">
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="Last name"
                    />
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                    placeholder="Enter your email"
                />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                    placeholder="Create a password"
                />
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                    placeholder="Confirm your password"
                />
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">I am a</label>
                <select
                    id="role"
                    name="role"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                >
                    <option value="">Select role</option>
                    <option value="client">Client</option>
                    <option value="photographer">Photographer</option>
                </select>
            </div>

            <button
                type="submit"
                class="w-full bg-teal-600 text-white py-2 px-4 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors"
            >
                Sign Up
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600">
                Already have an account?
                <a href="?page=login" class="text-teal-600 hover:text-teal-700 font-medium">Sign in</a>
            </p>
        </div>

        <div class="mt-4 text-center">
            <a href="?page=landing" class="text-sm text-gray-500 hover:text-gray-700">← Back to home</a>
        </div>
    </div>
</div>
