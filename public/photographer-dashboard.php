<?php
// Mock data for photographer dashboard
$job_matches = [
    [
        'id' => '1',
        'client' => 'Jessica & Mark',
        'event_type' => 'Wedding',
        'date' => '2024-04-15',
        'time' => '3:00 PM',
        'location' => 'Brooklyn Botanical Garden',
        'budget' => '$1,500 - $2,000',
        'description' => 'Looking for a photographer for our spring wedding. We love natural, candid shots and want someone who can capture the joy and emotion of our special day.',
        'match_score' => 95,
        'posted_ago' => '2 hours ago'
    ],
    [
        'id' => '2',
        'client' => 'TechStart Inc.',
        'event_type' => 'Corporate Event',
        'date' => '2024-03-28',
        'time' => '6:00 PM',
        'location' => 'Manhattan Conference Center',
        'budget' => '$800 - $1,200',
        'description' => 'Need professional photography for our product launch event. Looking for someone with experience in corporate photography and event coverage.',
        'match_score' => 88,
        'posted_ago' => '5 hours ago'
    ],
    [
        'id' => '3',
        'client' => 'The Johnson Family',
        'event_type' => 'Family Portrait',
        'date' => '2024-03-25',
        'time' => '11:00 AM',
        'location' => 'Central Park',
        'budget' => '$300 - $500',
        'description' => 'Annual family photos with our three kids. We\'d love outdoor shots with natural lighting in a park setting.',
        'match_score' => 82,
        'posted_ago' => '1 day ago'
    ]
];

$portfolio = [
    [
        'id' => '1',
        'title' => 'Elegant Wedding Ceremony',
        'image' => 'https://images.unsplash.com/photo-1742821855272-981ae713ebd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcm9mZXNzaW9uYWwlMjBwaG90b2dyYXBoZXIlMjB3ZWRkaW5nJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzU3NDA1NTk4fDA&ixlib=rb-4.1.0&q=80&w=400',
        'category' => 'Wedding',
        'likes' => 234,
        'views' => 1250,
        'featured' => true
    ],
    [
        'id' => '2',
        'title' => 'Corporate Headshots',
        'image' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=400',
        'category' => 'Corporate',
        'likes' => 156,
        'views' => 890,
        'featured' => true
    ],
    [
        'id' => '3',
        'title' => 'Family Portrait Session',
        'image' => 'https://images.unsplash.com/photo-1706824261828-6127b3beb64d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb3J0cmFpdCUyMHBob3RvZ3JhcGh5JTIwc3R1ZGlvJTIwcHJvZmVzc2lvbmFsfGVufDF8fHx8MTc1NzQwNTYwN3ww&ixlib=rb-4.1.0&q=80&w=400',
        'category' => 'Portrait',
        'likes' => 198,
        'views' => 1100,
        'featured' => false
    ]
];

$payments = [
    [
        'id' => '1',
        'client' => 'Sarah & James Wedding',
        'amount' => '$1,800',
        'date' => '2024-02-28',
        'status' => 'completed',
        'event_type' => 'Wedding'
    ],
    [
        'id' => '2',
        'client' => 'Corporate Headshots',
        'amount' => '$650',
        'date' => '2024-02-25',
        'status' => 'completed',
        'event_type' => 'Corporate'
    ],
    [
        'id' => '3',
        'client' => 'Family Portrait',
        'amount' => '$400',
        'date' => '2024-02-20',
        'status' => 'processing',
        'event_type' => 'Family'
    ]
];

$analytics = [
    'total_earnings' => '$15,240',
    'avg_rating' => 4.9,
    'total_bookings' => 47,
    'completion_rate' => 98,
    'monthly_earnings' => '$3,850',
    'weekly_bookings' => 3
];

// Get current tab from URL
$active_tab = $_GET['tab'] ?? 'jobs';
?>

<div class="min-h-screen bg-gray-50">
    <div class="flex w-full">
        <!-- Sidebar -->
        <div class="dashboard-sidebar">
            <div class="sidebar-header">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-camera text-black"></i>
                    </div>
                    <div>
                        <h2 class="sidebar-title">Photographer Portal</h2>
                        <p class="sidebar-subtitle">Welcome, Sarah Chen</p>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-menu">
                <a href="?page=photographer-dashboard&tab=jobs" class="sidebar-item <?php echo $active_tab === 'jobs' ? 'active' : ''; ?>">
                    <i class="fas fa-camera mr-3"></i>
                    Job Matches
                </a>
                <a href="?page=photographer-dashboard&tab=portfolio" class="sidebar-item <?php echo $active_tab === 'portfolio' ? 'active' : ''; ?>">
                    <i class="fas fa-upload mr-3"></i>
                    Portfolio
                </a>
                <a href="?page=photographer-dashboard&tab=payments" class="sidebar-item <?php echo $active_tab === 'payments' ? 'active' : ''; ?>">
                    <i class="fas fa-dollar-sign mr-3"></i>
                    Payments
                </a>
                <a href="?page=photographer-dashboard&tab=analytics" class="sidebar-item <?php echo $active_tab === 'analytics' ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line mr-3"></i>
                    Analytics
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-main">
            <div class="dashboard-header">
                <div>
                    <h1 class="dashboard-title">Photographer Dashboard</h1>
                    <p class="dashboard-subtitle">Manage your photography business and bookings</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2 bg-green-50 px-3 py-2 rounded-lg">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="text-sm text-green-700">Available</span>
                    </div>
                    <a href="?page=landing" class="btn btn-outline">
                        View Profile
                    </a>
                </div>
            </div>

            <!-- Job Matches Tab -->
            <?php if ($active_tab === 'jobs'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="mb-6">
                    <h2 class="section-title mb-2">Smart Job Matches</h2>
                    <p class="text-gray-600">Jobs that match your skills, location, and availability</p>
                </div>
                
                <div class="space-y-6">
                    <?php foreach ($job_matches as $job): ?>
                    <div class="job-match-card">
                        <div class="job-header">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <h3 class="job-title"><?php echo htmlspecialchars($job['event_type']); ?></h3>
                                    <span class="match-score <?php echo $job['match_score'] >= 90 ? 'high' : ($job['match_score'] >= 80 ? 'medium' : 'low'); ?>">
                                        <?php echo $job['match_score']; ?>% match
                                    </span>
                                    <span class="text-sm text-gray-500"><?php echo htmlspecialchars($job['posted_ago']); ?></span>
                                </div>
                                <p class="job-client mb-1">Client: <?php echo htmlspecialchars($job['client']); ?></p>
                                <p class="job-description mb-4"><?php echo htmlspecialchars($job['description']); ?></p>
                            </div>
                        </div>
                        
                        <div class="job-details">
                            <div class="job-detail">
                                <i class="fas fa-calendar mr-2"></i>
                                <?php echo htmlspecialchars($job['date']); ?>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-clock mr-2"></i>
                                <?php echo htmlspecialchars($job['time']); ?>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo htmlspecialchars($job['location']); ?>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-dollar-sign mr-2"></i>
                                <?php echo htmlspecialchars($job['budget']); ?>
                            </div>
                        </div>
                        
                        <div class="job-actions">
                            <div class="flex space-x-2">
                                <button class="btn btn-success" onclick="acceptJob('<?php echo $job['id']; ?>')">
                                    <i class="fas fa-check mr-2"></i>
                                    Accept
                                </button>
                                <button class="btn btn-decline" onclick="declineJob('<?php echo $job['id']; ?>')">
                                    <i class="fas fa-times mr-2"></i>
                                    Decline
                                </button>
                            </div>
                            <button class="btn btn-ghost btn-teal">
                                View Details
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Portfolio Tab -->
            <?php elseif ($active_tab === 'portfolio'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="portfolio-header">
                    <div>
                        <h2 class="section-title mb-2">Portfolio Management</h2>
                        <p class="text-gray-600">Showcase your best work to attract more clients</p>
                    </div>
                    <button class="btn btn-primary">
                        <i class="fas fa-upload mr-2"></i>
                        Upload Photos
                    </button>
                </div>
                
                <div class="portfolio-grid">
                    <?php foreach ($portfolio as $item): ?>
                    <div class="portfolio-card">
                        <div class="portfolio-image-container">
                            <img 
                                src="<?php echo htmlspecialchars($item['image']); ?>"
                                alt="<?php echo htmlspecialchars($item['title']); ?>"
                                class="portfolio-image"
                            />
                            <?php if ($item['featured']): ?>
                            <div class="featured-badge">
                                <i class="fas fa-star mr-1"></i>
                                Featured
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="portfolio-info">
                            <h3 class="portfolio-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <span class="category-badge"><?php echo htmlspecialchars($item['category']); ?></span>
                            <div class="portfolio-stats">
                                <div class="stat">
                                    <i class="fas fa-heart mr-1"></i>
                                    <?php echo $item['likes']; ?>
                                </div>
                                <div class="stat">
                                    <i class="fas fa-eye mr-1"></i>
                                    <?php echo $item['views']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Payments Tab -->
            <?php elseif ($active_tab === 'payments'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="mb-6">
                    <h2 class="section-title mb-2">Payment History</h2>
                    <p class="text-gray-600">Track your earnings and payment status</p>
                </div>
                
                <div class="payment-list">
                    <?php foreach ($payments as $payment): ?>
                    <div class="payment-card">
                        <div class="payment-info">
                            <h3 class="payment-client"><?php echo htmlspecialchars($payment['client']); ?></h3>
                            <p class="payment-type"><?php echo htmlspecialchars($payment['event_type']); ?></p>
                            <p class="payment-date"><?php echo htmlspecialchars($payment['date']); ?></p>
                        </div>
                        <div class="payment-amount-section">
                            <p class="payment-amount"><?php echo htmlspecialchars($payment['amount']); ?></p>
                            <span class="status-badge <?php echo $payment['status']; ?>">
                                <?php echo ucfirst($payment['status']); ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Analytics Tab -->
            <?php elseif ($active_tab === 'analytics'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="mb-6">
                    <h2 class="section-title mb-2">Business Analytics</h2>
                    <p class="text-gray-600">Track your performance and growth</p>
                </div>
                
                <div class="analytics-grid mb-8">
                    <div class="analytics-card">
                        <div class="analytics-icon bg-green-500">
                            <i class="fas fa-dollar-sign text-white"></i>
                        </div>
                        <div class="analytics-content">
                            <div class="analytics-value"><?php echo $analytics['total_earnings']; ?></div>
                            <div class="analytics-label">Total Earnings</div>
                            <div class="analytics-trend positive">
                                <i class="fas fa-trending-up"></i>
                                +12% from last month
                            </div>
                        </div>
                    </div>
                    
                    <div class="analytics-card">
                        <div class="analytics-icon bg-yellow-500">
                            <i class="fas fa-star text-white"></i>
                        </div>
                        <div class="analytics-content">
                            <div class="analytics-value"><?php echo $analytics['avg_rating']; ?></div>
                            <div class="analytics-label">Average Rating</div>
                            <div class="analytics-trend positive">
                                <i class="fas fa-trending-up"></i>
                                Excellent performance
                            </div>
                        </div>
                    </div>
                    
                    <div class="analytics-card">
                        <div class="analytics-icon bg-blue-500">
                            <i class="fas fa-camera text-white"></i>
                        </div>
                        <div class="analytics-content">
                            <div class="analytics-value"><?php echo $analytics['total_bookings']; ?></div>
                            <div class="analytics-label">Total Bookings</div>
                            <div class="analytics-trend positive">
                                <i class="fas fa-trending-up"></i>
                                +8 this month
                            </div>
                        </div>
                    </div>
                    
                    <div class="analytics-card">
                        <div class="analytics-icon bg-purple-500">
                            <i class="fas fa-award text-white"></i>
                        </div>
                        <div class="analytics-content">
                            <div class="analytics-value"><?php echo $analytics['completion_rate']; ?>%</div>
                            <div class="analytics-label">Completion Rate</div>
                            <div class="analytics-trend positive">
                                <i class="fas fa-trending-up"></i>
                                Outstanding
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="analytics-details">
                    <div class="analytics-section">
                        <h3 class="analytics-section-title">Monthly Performance</h3>
                        <div class="progress-item">
                            <div class="progress-label">
                                <span>Monthly Earnings</span>
                                <span class="progress-value"><?php echo $analytics['monthly_earnings']; ?></span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="progress-item">
                            <div class="progress-label">
                                <span>Weekly Bookings</span>
                                <span class="progress-value"><?php echo $analytics['weekly_bookings']; ?></span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="achievements-section">
                        <h3 class="analytics-section-title">Recent Achievements</h3>
                        <div class="achievement-list">
                            <div class="achievement-item">
                                <div class="achievement-icon bg-green-100">
                                    <i class="fas fa-award text-green-600"></i>
                                </div>
                                <div class="achievement-content">
                                    <p class="achievement-title">Top Rated Photographer</p>
                                    <p class="achievement-desc">Achieved 4.9+ rating</p>
                                </div>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon bg-blue-100">
                                    <i class="fas fa-camera text-blue-600"></i>
                                </div>
                                <div class="achievement-content">
                                    <p class="achievement-title">50 Bookings Milestone</p>
                                    <p class="achievement-desc">Completed this month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Additional styles for photographer dashboard */
.job-match-card {
    background: white;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    border: 0;
    transition: all 0.3s ease;
}

.job-match-card:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.job-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #111827;
}

.match-score {
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
}

.match-score.high {
    background: #dcfce7;
    color: #166534;
}

.match-score.medium {
    background: #fef3c7;
    color: #92400e;
}

.match-score.low {
    background: #e5e7eb;
    color: #374151;
}

.job-client {
    color: #6b7280;
    font-weight: 500;
}

.job-description {
    font-size: 0.875rem;
    color: #6b7280;
}

.job-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.job-detail {
    display: flex;
    align-items: center;
}

.job-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn-success {
    background: #22c55e;
    color: white;
}

.btn-success:hover {
    background: #16a34a;
}

.btn-decline {
    border: 1px solid #fca5a5;
    color: #dc2626;
    background: transparent;
}

.btn-decline:hover {
    background: #fef2f2;
}

.btn-ghost {
    background: transparent;
    border: none;
    color: var(--teal);
}

.btn-ghost:hover {
    color: var(--teal-dark);
}

/* Portfolio styles */
.portfolio-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.portfolio-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.portfolio-card:hover {
    transform: scale(1.02);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.portfolio-image-container {
    aspect-ratio: 4 / 3;
    overflow: hidden;
    position: relative;
}

.portfolio-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.portfolio-card:hover .portfolio-image {
    transform: scale(1.1);
}

.featured-badge {
    position: absolute;
    top: 0.75rem;
    left: 0.75rem;
    background: #fbbf24;
    color: #000;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.portfolio-info {
    padding: 1rem;
}

.portfolio-title {
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.5rem;
}

.category-badge {
    background: #f3f4f6;
    color: #374151;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    font-weight: 500;
    margin-bottom: 0.75rem;
    display: inline-block;
}

.portfolio-stats {
    display: flex;
    justify-content: space-between;
    font-size: 0.875rem;
    color: #6b7280;
}

/* Payment styles */
.payment-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.payment-card {
    background: white;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.payment-client {
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.25rem;
}

.payment-type {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.payment-date {
    font-size: 0.875rem;
    color: #6b7280;
}

.payment-amount-section {
    text-align: right;
}

.payment-amount {
    font-size: 1.125rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 0.5rem;
}

/* Analytics styles */
.analytics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.analytics-card {
    background: white;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.analytics-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.analytics-content {
    flex: 1;
}

.analytics-value {
    font-size: 1.875rem;
    font-weight: 700;
    color: #111827;
    line-height: 1.2;
}

.analytics-label {
    color: #6b7280;
    font-weight: 500;
    margin-bottom: 0.25rem;
}

.analytics-trend {
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.analytics-trend.positive {
    color: #16a34a;
}

.analytics-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.analytics-section {
    background: white;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.analytics-section-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 1rem;
}

.progress-item {
    margin-bottom: 1rem;
}

.progress-label {
    display: flex;
    justify-content: space-between;
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.progress-value {
    font-weight: 600;
}

.achievements-section {
    background: white;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.achievement-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.achievement-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.achievement-icon {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.achievement-title {
    font-size: 0.875rem;
    font-weight: 500;
    color: #111827;
}

.achievement-desc {
    font-size: 0.75rem;
    color: #6b7280;
}

@media (max-width: 768px) {
    .analytics-details {
        grid-template-columns: 1fr;
    }
    
    .job-details {
        grid-template-columns: 1fr;
    }
    
    .job-actions {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
}
</style>

<script>
function acceptJob(jobId) {
    if (confirm('Are you sure you want to accept this job?')) {
        showNotification(`Job #${jobId} accepted successfully!`, 'success');
        // Here you would make an AJAX call to accept the job
    }
}

function declineJob(jobId) {
    if (confirm('Are you sure you want to decline this job?')) {
        showNotification(`Job #${jobId} declined.`, 'info');
        // Here you would make an AJAX call to decline the job
    }
}
</script>