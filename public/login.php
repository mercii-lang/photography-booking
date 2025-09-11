<?php
session_start();
require_once '../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT id, password, role, first_name, last_name FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];

            // Redirect based on role
            switch ($user['role']) {
                case 'admin':
                    header('Location: ?page=admin-dashboard');
                    break;
                case 'photographer':
                    header('Location: ?page=photographer-dashboard');
                    break;
                case 'client':
                default:
                    header('Location: ?page=client-dashboard');
                    break;
            }
            exit;
        } else {
            $error = 'Invalid email or password';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PhotoBooking</title>
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link rel="stylesheet" href="../assets/css/photography-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-neutral-warm via-white to-neutral-cool min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full auth-container rounded-2xl overflow-hidden" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2);">
        <div class="auth-header relative z-10 bg-gradient-to-r from-gold to-teal rounded-t-2xl p-8 text-center text-white overflow-hidden">
            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-camera text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2" style="font-family: 'Playfair Display', serif;">Welcome Back</h1>
            <p class="text-white/90 font-medium">Sign in to your PhotoBooking account</p>
        </div>

        <?php if ($error): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 animate-pulse flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <form method="POST" class="auth-form space-y-6 p-8">
            <div class="form-group relative">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2" style="font-family: 'Inter', sans-serif;">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="form-input w-full pl-12"
                    placeholder="Enter your email"
                    autocomplete="email"
                >
                <i class="fas fa-envelope input-icon"></i>
            </div>

            <div class="form-group relative">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2" style="font-family: 'Inter', sans-serif;">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="form-input w-full pl-12"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                >
                <i class="fas fa-lock input-icon"></i>
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500 mr-2">
                    <span class="text-sm text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-teal-600 hover:text-teal-700 font-medium">Forgot password?</a>
            </div>

            <button
                type="submit"
                class="btn btn-primary w-full text-lg py-3 font-semibold flex items-center justify-center"
            >
                <i class="fas fa-sign-in-alt mr-2"></i>
                Sign In
            </button>
        </form>

        <div class="auth-links text-center mt-6">
            <p class="text-gray-600 mb-4">
                Don't have an account?
                <a href="?page=signup" class="text-teal-600 hover:text-teal-700 font-semibold ml-1">Create one here</a>
            </p>
            <a href="?page=landing" class="inline-flex items-center text-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to home
            </a>
        </div>
    </div>
</body>
</html>
