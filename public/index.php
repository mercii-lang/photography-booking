<?php
session_start();

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ?page=landing');
    exit;
}

// Get current page from URL parameter, default to 'landing'
$current_page = $_GET['page'] ?? 'landing';
$valid_pages = ['landing', 'client-dashboard', 'photographer-dashboard', 'admin-dashboard', 'gallery', 'search', 'login', 'signup'];

if (!in_array($current_page, $valid_pages)) {
    $current_page = 'landing';
}

// Mock data for development
$photographers = [
    [
        'id' => 1,
        'name' => 'Sarah Chen',
        'image' => 'https://images.unsplash.com/photo-1742821855272-981ae713ebd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcm9mZXNzaW9uYWwlMjBwaG90b2dyYXBoZXIlMjB3ZWRkaW5nJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzU3NDA1NTk4fDA&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.9,
        'reviews' => 127,
        'specialties' => ['Wedding', 'Portrait', 'Event'],
        'location' => 'New York, NY',
        'price' => '$200/hr',
        'featured' => true
    ],
    [
        'id' => 2,
        'name' => 'Marcus Rivera',
        'image' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.8,
        'reviews' => 89,
        'specialties' => ['Corporate', 'Event', 'Headshots'],
        'location' => 'Los Angeles, CA',
        'price' => '$180/hr',
        'featured' => true
    ],
    [
        'id' => 3,
        'name' => 'Emma Thompson',
        'image' => 'https://images.unsplash.com/photo-1706824261828-6127b3beb64d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb3J0cmFpdCUyMHBob3RvZ3JhcGh5JTIwc3R1ZGlvJTIwcHJvZmVzc2lvbmFsfGVufDF8fHx8MTc1NzQwNTYwN3ww&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 5.0,
        'reviews' => 156,
        'specialties' => ['Fashion', 'Portrait', 'Commercial'],
        'location' => 'Miami, FL',
        'price' => '$250/hr',
        'featured' => true
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoBooking - Professional Photography Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link rel="stylesheet" href="../assets/css/photography-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-blue-50 text-gray-900 min-h-screen">
    <?php include '../navigation.php'; ?>
    
    <main class="pt-20">
        <?php
        switch ($current_page) {
            case 'client-dashboard':
                include 'client-dashboard.php';
                break;
            case 'photographer-dashboard':
                include 'photographer-dashboard.php';
                break;
            case 'admin-dashboard':
                include 'admin-dashboard.php';
                break;
            case 'gallery':
                include 'smart-gallery.php';
                break;
            case 'search':
                include 'search.php';
                break;
            case 'login':
                include 'login.php';
                break;
            case 'signup':
                include 'signup.php';
                break;
            case 'landing':
            default:
                include 'landing.php';
                break;
        }
        ?>
    </main>

    <script src="../assets/js/photography.js"></script>
</body>
</html>