<?php
session_start();
require_once 'config/config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        $stmt = $pdo->prepare('SELECT id, name, email, password_hash, role FROM users WHERE email = ? AND status = "active"');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

if ($user && password_verify($password, $user['password_hash'])) {
    // Successful login
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];

    if ($user['role'] === 'client') {
        header('Location: public/client.php');
    } elseif ($user['role'] === 'photographer') {
        header('Location: public/photographer.php');
    } else {
        header('Location: public/index.html');
    }
    exit;
} else {
    $error = 'Invalid email or password.';
}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - PhotoBook</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</style>
</head>
  <body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5">
        <div class="login-container p-4 shadow rounded bg-white">
          <h3 class="mb-4">Login to PhotoBook</h3>
          <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>
          <form method="POST" action="login.php" novalidate>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
          <p class="mt-3">Don't have an account? <a href="signup.php">Register here</a></p>
        </div>
      </div>
      <div class="col-md-7 d-none d-md-block p-0">
        <img src="img/portfolio/2.jpg" alt="Login Image" class="img-fluid h-100 w-100" style="object-fit: cover;" />
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#loginImageSlider").owlCarousel({
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
