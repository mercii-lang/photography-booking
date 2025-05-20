<?php
session_start();
require_once 'config/config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = $_POST['role'] ?? '';

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($role)) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (!in_array($role, ['client', 'photographer'])) {
        $error = 'Invalid role selected.';
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Email is already registered.';
        } else {
            // Insert new user
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (name, email, password_hash, role, status) VALUES (?, ?, ?, ?, ?)');
            $result = $stmt->execute([$name, $email, $password_hash, $role, 'active']);
            if ($result) {
                header('Location: login.php');
                exit;
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - PhotoBook</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</style>
</head>
  <body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5">
        <div class="register-container p-4 shadow rounded bg-white">
          <h3 class="mb-4">Register for PhotoBook</h3>
          <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
          <?php elseif ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
          <?php endif; ?>
          <form method="POST" action="signup.php" novalidate>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Register as</label>
              <select class="form-select" id="role" name="role" required>
                <option value="" disabled <?= empty($_POST['role']) ? 'selected' : '' ?>>Select role</option>
                <option value="client" <?= (($_POST['role'] ?? '') === 'client') ? 'selected' : '' ?>>Client</option>
                <option value="photographer" <?= (($_POST['role'] ?? '') === 'photographer') ? 'selected' : '' ?>>Photographer</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
          </form>
          <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
        </div>
      </div>
      <div class="col-md-7 d-none d-md-block p-0">
        <div id="signupImageSlider" class="owl-carousel owl-theme h-100">
          <div class="item"><img src="img/portfolio/1.jpg" alt="Image 1" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/2.jpg" alt="Image 2" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/3.jpg" alt="Image 3" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/4.jpg" alt="Image 4" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/5.jpg" alt="Image 5" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/6.jpg" alt="Image 6" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/7.jpg" alt="Image 7" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/8.jpg" alt="Image 8" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/9.jpg" alt="Image 9" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
          <div class="item"><img src="img/portfolio/10.jpg" alt="Image 10" class="img-fluid h-100 w-100" style="object-fit: cover;" /></div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#signupImageSlider").owlCarousel({
        items:1,
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        animateOut: 'fadeOut'
      });
    });
  </script>
  </body>
</html>
