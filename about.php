<?php
session_start();
require_once 'config/config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user info and role
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit;
}

$role = $user['role'];

// Fetch photographer info if exists
$photographer = null;
if ($role === 'photographer') {
    $stmt = $pdo->prepare('SELECT * FROM photographers WHERE user_id = ?');
    $stmt->execute([$user_id]);
    $photographer = $stmt->fetch();
}

// Handle form submission for photographer update
$message = '';
if ($role === 'photographer' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $bio = $_POST['bio'] ?? '';
    $location = $_POST['location'] ?? '';
    $portfolio_url = $_POST['portfolio_url'] ?? '';
    $instagram_handle = $_POST['instagram_handle'] ?? '';
    $auto_sync_portfolio = isset($_POST['auto_sync_portfolio']) ? 1 : 0;

    if ($photographer) {
        // Update existing photographer record
        $stmt = $pdo->prepare('UPDATE photographers SET bio = ?, location = ?, portfolio_url = ?, instagram_handle = ?, auto_sync_portfolio = ? WHERE user_id = ?');
        $success = $stmt->execute([$bio, $location, $portfolio_url, $instagram_handle, $auto_sync_portfolio, $user_id]);
        if ($success) {
            $message = "Profile updated successfully.";
        } else {
            $message = "Failed to update profile.";
        }
    } else {
        // Insert new photographer record
        $stmt = $pdo->prepare('INSERT INTO photographers (user_id, bio, location, portfolio_url, instagram_handle, auto_sync_portfolio, subscription_status) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $success = $stmt->execute([$user_id, $bio, $location, $portfolio_url, $instagram_handle, $auto_sync_portfolio, 'expired']);
        if ($success) {
            $message = "Profile created successfully.";
            // Reload photographer info
            $stmt = $pdo->prepare('SELECT * FROM photographers WHERE user_id = ?');
            $stmt->execute([$user_id]);
            $photographer = $stmt->fetch();
        } else {
            $message = "Failed to create profile.";
        }
    }
}

// Fetch portfolio images if photographer info exists
$portfolio_images = [];
if ($photographer) {
    $stmt = $pdo->prepare('SELECT * FROM portfolio_images WHERE photographer_id = ? ORDER BY created_at DESC');
    $stmt->execute([$photographer['id']]);
    $portfolio_images = $stmt->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Photographer Portfolio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Photographer Portfolio">
	<meta name="keywords" content="photographer, portfolio">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloader -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section  -->
	<header class="header-section">
		<a href="index.html" class="site-logo"><img src="img/IMG_2126.JPG" alt="logo"></a>
		<div class="header-controls">
			<button class="nav-switch-btn"><i class="fa fa-bars"></i></button>
			<button class="search-btn"><i class="fa fa-search"></i></button>
		</div>
		<ul class="main-menu">
			<li><a href="index.html">Home</a></li>
			<li><a href="about.php">About the Artist</a></li>
			<li>
				<a href="#">Portfolio</a>
				<ul class="sub-menu">
					<li><a href="portfolio.html">Portfolio 1</a></li>
					<li><a href="portfolio-1.html">Portfolio 2</a></li>
					<li><a href="portfolio-2.html">Portfolio 3</a></li>
				</ul>
			</li>
			<li><a href="blog.html">Blog</a></li>
			<li><a href="elements.html">Elements</a></li>
			<li><a href="contact.html">Contact</a></li>
			<li><a href="signup.php">Create Account</a></li>
			<li class="search-mobile">
				<button class="search-btn"><i class="fa fa-search"></i></button>
			</li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<!-- Header section end  -->

	<!-- Main content section -->
	<div class="container mt-5">
		<h1 class="mb-4">Photographer Portfolio</h1>
		<p>Welcome, <?php echo htmlspecialchars($user['name']); ?> (<?php echo htmlspecialchars($role); ?>)</p>

		<?php if ($message): ?>
			<div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
		<?php endif; ?>

		<?php if ($role === 'client'): ?>
			<?php if ($photographer): ?>
				<h2><?php echo htmlspecialchars($user['name']); ?>'s Portfolio</h2>
				<p><strong>Bio:</strong> <?php echo nl2br(htmlspecialchars($photographer['bio'])); ?></p>
				<p><strong>Location:</strong> <?php echo htmlspecialchars($photographer['location']); ?></p>
				<p><strong>Portfolio URL:</strong> <a href="<?php echo htmlspecialchars($photographer['portfolio_url']); ?>" target="_blank"><?php echo htmlspecialchars($photographer['portfolio_url']); ?></a></p>
				<p><strong>Instagram:</strong> <a href="https://instagram.com/<?php echo htmlspecialchars($photographer['instagram_handle']); ?>" target="_blank">@<?php echo htmlspecialchars($photographer['instagram_handle']); ?></a></p>
				<h3>Portfolio Images</h3>
				<div class="row">
					<?php foreach ($portfolio_images as $image): ?>
						<div class="col-md-3 mb-3">
							<img src="<?php echo htmlspecialchars($image['image_url']); ?>" alt="Portfolio Image" class="img-fluid rounded" />
						</div>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<p>No portfolio information available.</p>
			<?php endif; ?>

		<?php elseif ($role === 'photographer'): ?>
			<form method="post" action="about.php">
				<div class="mb-3">
					<label for="bio" class="form-label">Bio</label>
					<textarea id="bio" name="bio" class="form-control" rows="4"><?php echo htmlspecialchars($photographer['bio'] ?? ''); ?></textarea>
				</div>
				<div class="mb-3">
					<label for="location" class="form-label">Location</label>
					<input id="location" name="location" type="text" class="form-control" value="<?php echo htmlspecialchars($photographer['location'] ?? ''); ?>" />
				</div>
				<div class="mb-3">
					<label for="portfolio_url" class="form-label">Portfolio URL</label>
					<input id="portfolio_url" name="portfolio_url" type="url" class="form-control" value="<?php echo htmlspecialchars($photographer['portfolio_url'] ?? ''); ?>" />
				</div>
				<div class="mb-3">
					<label for="instagram_handle" class="form-label">Instagram Handle</label>
					<input id="instagram_handle" name="instagram_handle" type="text" class="form-control" value="<?php echo htmlspecialchars($photographer['instagram_handle'] ?? ''); ?>" />
				</div>
				<div class="form-check mb-3">
					<input id="auto_sync_portfolio" name="auto_sync_portfolio" type="checkbox" class="form-check-input" <?php echo (!empty($photographer['auto_sync_portfolio'])) ? 'checked' : ''; ?> />
					<label for="auto_sync_portfolio" class="form-check-label">Auto Sync Portfolio</label>
				</div>
				<button type="submit" class="btn btn-primary">Save</button>
			</form>

			<h3 class="mt-5">Portfolio Images</h3>
			<div class="row">
				<?php foreach ($portfolio_images as $image): ?>
					<div class="col-md-3 mb-3">
						<img src="<?php echo htmlspecialchars($image['image_url']); ?>" alt="Portfolio Image" class="img-fluid rounded" />
					</div>
				<?php endforeach; ?>
			</div>

		<?php else: ?>
			<p>Your role does not have access to this page.</p>
		<?php endif; ?>
	</div>

	<!-- Footer section   -->
	<footer class="footer-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 order-1 order-md-2">
					<div class="footer-social-links">
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-dribbble"></i></a>
						<a href=""><i class="fa fa-behance"></i></a>
					</div>
				</div>
				<div class="col-md-6 order-2 order-md-1">
					<div class="copyright">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">mimi</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/instafeed.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
