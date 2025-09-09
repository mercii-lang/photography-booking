<?php
session_start();
require_once '../config/db.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ?page=login');
    exit;
}

// Get stats
$total_users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$total_clients = $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn();
$total_photographers = $pdo->query("SELECT COUNT(*) FROM photographers")->fetchColumn();
$total_bookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();

// Get recent users
$recent_users = $pdo->query("
    SELECT u.id, u.first_name, u.last_name, u.email, u.role, u.created_at
    FROM users u
    ORDER BY u.created_at DESC
    LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);

// Get recent bookings
$recent_bookings = $pdo->query("
    SELECT b.id, b.event_type, b.status, b.created_at,
           u.first_name, u.last_name,
           p.first_name as photographer_first, p.last_name as photographer_last
    FROM bookings b
    JOIN clients c ON b.client_id = c.id
    JOIN users u ON c.user_id = u.id
    JOIN photographers ph ON b.photographer_id = ph.id
    JOIN users p ON ph.user_id = p.id
    ORDER BY b.created_at DESC
    LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);

// Get current tab
$active_tab = $_GET['tab'] ?? 'overview';
?>

<div class="min-h-screen bg-gray-50">
    <div class="flex w-full">
        <!-- Sidebar -->
        <div class="dashboard-sidebar">
            <div class="sidebar-header">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-pink-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-cog text-white"></i>
                    </div>
                    <div>
                        <h2 class="sidebar-title">Admin Panel</h2>
                        <p class="sidebar-subtitle">System Management</p>
                    </div>
                </div>
            </div>

            <div class="sidebar-menu">
                <a href="?page=admin-dashboard&tab=overview" class="sidebar-item <?php echo $active_tab === 'overview' ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line mr-3"></i>
                    Overview
                </a>
                <a href="?page=admin-dashboard&tab=users" class="sidebar-item <?php echo $active_tab === 'users' ? 'active' : ''; ?>">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
                <a href="?page=admin-dashboard&tab=bookings" class="sidebar-item <?php echo $active_tab === 'bookings' ? 'active' : ''; ?>">
                    <i class="fas fa-calendar mr-3"></i>
                    Bookings
                </a>
                <a href="?page=admin-dashboard&tab=photographers" class="sidebar-item <?php echo $active_tab === 'photographers' ? 'active' : ''; ?>">
                    <i class="fas fa-camera mr-3"></i>
                    Photographers
                </a>
                <a href="?page=admin-dashboard&tab=reports" class="sidebar-item <?php echo $active_tab === 'reports' ? 'active' : ''; ?>">
                    <i class="fas fa-file-alt mr-3"></i>
                    Reports
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-main">
            <div class="dashboard-header">
                <div>
                    <h1 class="dashboard-title">Admin Dashboard</h1>
                    <p class="dashboard-subtitle">Manage the photography booking platform</p>
                </div>
                <a href="?page=landing" class="btn btn-outline">
                    <i class="fas fa-home mr-2"></i>
                    View Site
                </a>
            </div>

            <!-- Overview Tab -->
            <?php if ($active_tab === 'overview'): ?>
            <div class="dashboard-content fade-in-up">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm border">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <i class="fas fa-users text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Users</p>
                                <p class="text-2xl font-bold text-gray-900"><?php echo $total_users; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border">
                        <div class="flex items-center">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <i class="fas fa-user-friends text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Clients</p>
                                <p class="text-2xl font-bold text-gray-900"><?php echo $total_clients; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border">
                        <div class="flex items-center">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <i class="fas fa-camera text-purple-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Photographers</p>
                                <p class="text-2xl font-bold text-gray-900"><?php echo $total_photographers; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border">
                        <div class="flex items-center">
                            <div class="p-2 bg-orange-100 rounded-lg">
                                <i class="fas fa-calendar text-orange-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Bookings</p>
                                <p class="text-2xl font-bold text-gray-900"><?php echo $total_bookings; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Users -->
                    <div class="bg-white p-6 rounded-lg shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h3>
                        <div class="space-y-3">
                            <?php foreach ($recent_users as $user): ?>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600 text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                                        </p>
                                        <p class="text-xs text-gray-500"><?php echo htmlspecialchars($user['email']); ?></p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full <?php echo $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : ($user['role'] === 'photographer' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800'); ?>">
                                    <?php echo ucfirst($user['role']); ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Recent Bookings -->
                    <div class="bg-white p-6 rounded-lg shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Bookings</h3>
                        <div class="space-y-3">
                            <?php foreach ($recent_bookings as $booking): ?>
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">
                                        <?php echo htmlspecialchars($booking['event_type']); ?>
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <?php echo htmlspecialchars($booking['first_name'] . ' ' . $booking['last_name']); ?> →
                                        <?php echo htmlspecialchars($booking['photographer_first'] . ' ' . $booking['photographer_last']); ?>
                                    </p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full <?php echo $booking['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                                    <?php echo ucfirst($booking['status']); ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Tab -->
            <?php elseif ($active_tab === 'users'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">User Management</h2>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus mr-2"></i>
                        Add User
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            $all_users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($all_users as $user):
                            ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-gray-600 text-sm"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                                            </div>
                                            <div class="text-sm text-gray-500"><?php echo htmlspecialchars($user['email']); ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full <?php echo $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : ($user['role'] === 'photographer' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800'); ?>">
                                        <?php echo ucfirst($user['role']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo date('M j, Y', strtotime($user['created_at'])); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Other tabs can be added similarly -->
            <?php else: ?>
            <div class="dashboard-content fade-in-up">
                <div class="text-center py-12">
                    <i class="fas fa-tools text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Feature Coming Soon</h3>
                    <p class="text-gray-500">This section is under development.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
