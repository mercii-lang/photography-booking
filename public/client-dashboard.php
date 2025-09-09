<?php
// Mock booking data
$bookings = [
    [
        'id' => '1',
        'photographer' => 'Sarah Chen',
        'photographer_image' => 'https://images.unsplash.com/photo-1742821855272-981ae713ebd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcm9mZXNzaW9uYWwlMjBwaG90b2dyYXBoZXIlMjB3ZWRkaW5nJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzU3NDA1NTk4fDA&ixlib=rb-4.1.0&q=80&w=200',
        'event_type' => 'Wedding',
        'date' => '2024-03-15',
        'time' => '2:00 PM',
        'location' => 'Central Park, NY',
        'status' => 'confirmed',
        'price' => '$1,200',
        'progress' => 25,
        'photos' => null
    ],
    [
        'id' => '2',
        'photographer' => 'Marcus Rivera',
        'photographer_image' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=200',
        'event_type' => 'Corporate Event',
        'date' => '2024-02-28',
        'time' => '10:00 AM',
        'location' => 'Manhattan Office',
        'status' => 'completed',
        'price' => '$800',
        'progress' => 100,
        'photos' => 156
    ]
];

$galleries = [
    [
        'id' => '1',
        'name' => 'Corporate Headshots 2024',
        'photographer' => 'Marcus Rivera',
        'event_type' => 'Corporate',
        'date' => '2024-02-28',
        'photos' => 156,
        'cover_image' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=400'
    ],
    [
        'id' => '2',
        'name' => 'Family Portrait Session',
        'photographer' => 'Emma Thompson',
        'event_type' => 'Family',
        'date' => '2024-01-20',
        'photos' => 89,
        'cover_image' => 'https://images.unsplash.com/photo-1706824261828-6127b3beb64d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb3J0cmFpdCUyMHBob3RvZ3JhcGh5JTIwc3R1ZGlvJTIwcHJvZmVzc2lvbmFsfGVufDF8fHx8MTc1NzQwNTYwN3ww&ixlib=rb-4.1.0&q=80&w=400'
    ]
];

$recommendations = [
    [
        'id' => '1',
        'photographer' => 'David Kim',
        'photographer_image' => 'https://images.unsplash.com/photo-1751107996128-6a85dae2a7e0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwaG90b2dyYXBoZXIlMjBjYW1lcmElMjBlcXVpcG1lbnQlMjBwcm9mZXNzaW9uYWx8ZW58MXx8fHwxNzU3NDA1NjE1fDA&ixlib=rb-4.1.0&q=80&w=200',
        'specialty' => 'Family Photography',
        'rating' => 4.9,
        'price' => '$175/hr',
        'reason' => 'Perfect for upcoming family events'
    ],
    [
        'id' => '2',
        'photographer' => 'Lisa Zhang',
        'photographer_image' => 'https://images.unsplash.com/photo-1571538557366-4bdde003beb4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlbGVnYW50JTIwcGhvdG8lMjBnYWxsZXJ5JTIwZXhoaWJpdGlvbnxlbnwxfHx8fDE3NTc0MDU2MTJ8MA&ixlib=rb-4.1.0&q=80&w=200',
        'specialty' => 'Portrait Photography',
        'rating' => 4.8,
        'price' => '$200/hr',
        'reason' => 'Top-rated in your area'
    ]
];

// Get current tab from URL
$active_tab = $_GET['tab'] ?? 'bookings';
?>

<div class="min-h-screen bg-gray-50">
    <div class="flex w-full">
        <!-- Sidebar -->
        <div class="dashboard-sidebar">
            <div class="sidebar-header">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-camera text-white"></i>
                    </div>
                    <div>
                        <h2 class="sidebar-title">Client Portal</h2>
                        <p class="sidebar-subtitle">Welcome back, John</p>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-menu">
                <a href="?page=client-dashboard&tab=bookings" class="sidebar-item <?php echo $active_tab === 'bookings' ? 'active' : ''; ?>">
                    <i class="fas fa-calendar mr-3"></i>
                    My Bookings
                </a>
                <a href="?page=client-dashboard&tab=moodboard" class="sidebar-item <?php echo $active_tab === 'moodboard' ? 'active' : ''; ?>">
                    <i class="fas fa-upload mr-3"></i>
                    Upload Mood Board
                </a>
                <a href="?page=client-dashboard&tab=galleries" class="sidebar-item <?php echo $active_tab === 'galleries' ? 'active' : ''; ?>">
                    <i class="fas fa-images mr-3"></i>
                    My Galleries
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-main">
            <div class="dashboard-header">
                <div>
                    <h1 class="dashboard-title">Dashboard</h1>
                    <p class="dashboard-subtitle">Manage your photography bookings and galleries</p>
                </div>
                <a href="?page=landing" class="btn btn-primary">
                    <i class="fas fa-camera mr-2"></i>
                    Book New Session
                </a>
            </div>

            <!-- Bookings Tab -->
            <?php if ($active_tab === 'bookings'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="dashboard-grid">
                    <!-- Current Bookings -->
                    <div class="dashboard-section">
                        <h2 class="section-title">Current Bookings</h2>
                        <div class="booking-list">
                            <?php foreach ($bookings as $booking): ?>
                            <div class="booking-card">
                                <div class="booking-header">
                                    <img 
                                        src="<?php echo htmlspecialchars($booking['photographer_image']); ?>"
                                        alt="<?php echo htmlspecialchars($booking['photographer']); ?>"
                                        class="photographer-avatar"
                                    />
                                    <div class="booking-info">
                                        <div class="booking-title-row">
                                            <div>
                                                <h3 class="booking-title"><?php echo htmlspecialchars($booking['event_type']); ?></h3>
                                                <p class="booking-photographer">with <?php echo htmlspecialchars($booking['photographer']); ?></p>
                                            </div>
                                            <span class="status-badge <?php echo $booking['status']; ?>">
                                                <?php echo ucfirst($booking['status']); ?>
                                            </span>
                                        </div>
                                        
                                        <div class="booking-details">
                                            <div class="booking-detail">
                                                <i class="fas fa-calendar mr-2"></i>
                                                <?php echo $booking['date']; ?> at <?php echo $booking['time']; ?>
                                            </div>
                                            <div class="booking-detail">
                                                <i class="fas fa-map-marker-alt mr-2"></i>
                                                <?php echo htmlspecialchars($booking['location']); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="progress-section">
                                            <div class="progress-header">
                                                <span>Event Progress</span>
                                                <span><?php echo $booking['progress']; ?>%</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: <?php echo $booking['progress']; ?>%"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="booking-footer">
                                            <span class="booking-price"><?php echo htmlspecialchars($booking['price']); ?></span>
                                            <div class="booking-actions">
                                                <?php if ($booking['status'] === 'completed' && $booking['photos']): ?>
                                                <a href="?page=gallery&booking_id=<?php echo $booking['id']; ?>" class="btn btn-sm btn-teal">
                                                    View Photos (<?php echo $booking['photos']; ?>)
                                                </a>
                                                <?php endif; ?>
                                                <button class="btn btn-sm btn-outline">
                                                    Contact
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Recommendations -->
                    <div class="recommendations-section">
                        <h2 class="section-title">Smart Recommendations</h2>
                        <div class="recommendations-list">
                            <?php foreach ($recommendations as $rec): ?>
                            <div class="recommendation-card">
                                <div class="recommendation-header">
                                    <img 
                                        src="<?php echo htmlspecialchars($rec['photographer_image']); ?>"
                                        alt="<?php echo htmlspecialchars($rec['photographer']); ?>"
                                        class="photographer-avatar-sm"
                                    />
                                    <div>
                                        <h4 class="recommendation-name"><?php echo htmlspecialchars($rec['photographer']); ?></h4>
                                        <p class="recommendation-specialty"><?php echo htmlspecialchars($rec['specialty']); ?></p>
                                    </div>
                                </div>
                                
                                <div class="recommendation-meta">
                                    <div class="recommendation-rating">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="rating-score"><?php echo $rec['rating']; ?></span>
                                    </div>
                                    <span class="recommendation-price"><?php echo htmlspecialchars($rec['price']); ?></span>
                                </div>
                                
                                <p class="recommendation-reason"><?php echo htmlspecialchars($rec['reason']); ?></p>
                                
                                <button class="btn btn-sm btn-primary w-full">
                                    Book Now
                                </button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mood Board Tab -->
            <?php elseif ($active_tab === 'moodboard'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="moodboard-section">
                    <h2 class="section-title">Upload Mood Board</h2>
                    <p class="section-subtitle mb-8">Share your vision with photographers by uploading inspiration images, color palettes, and style references.</p>
                    
                    <div class="upload-area">
                        <i class="fas fa-upload upload-icon"></i>
                        <h3 class="upload-title">Drag and drop your inspiration images</h3>
                        <p class="upload-subtitle">or click to browse your files</p>
                        <button class="btn btn-teal">
                            Choose Files
                        </button>
                    </div>
                    
                    <div class="moodboard-options">
                        <div class="style-preferences">
                            <h4 class="option-title">Style Preferences</h4>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" class="checkbox-input">
                                    <span>Natural & Candid</span>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" class="checkbox-input">
                                    <span>Classic & Timeless</span>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" class="checkbox-input">
                                    <span>Modern & Artistic</span>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" class="checkbox-input">
                                    <span>Vintage & Film</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="color-palette">
                            <h4 class="option-title">Color Palette</h4>
                            <div class="color-grid">
                                <button class="color-swatch bg-red-400" data-color="red"></button>
                                <button class="color-swatch bg-blue-400" data-color="blue"></button>
                                <button class="color-swatch bg-green-400" data-color="green"></button>
                                <button class="color-swatch bg-yellow-400" data-color="yellow"></button>
                                <button class="color-swatch bg-purple-400" data-color="purple"></button>
                                <button class="color-swatch bg-pink-400" data-color="pink"></button>
                                <button class="color-swatch bg-gray-400" data-color="gray"></button>
                                <button class="color-swatch bg-black" data-color="black"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Galleries Tab -->
            <?php elseif ($active_tab === 'galleries'): ?>
            <div class="dashboard-content fade-in-up">
                <div class="galleries-header">
                    <h2 class="section-title">My Galleries</h2>
                    <div class="view-controls">
                        <button class="btn btn-sm btn-outline active">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="btn btn-sm btn-outline">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                
                <div class="galleries-grid">
                    <?php foreach ($galleries as $gallery): ?>
                    <div class="gallery-card" onclick="window.location.href='?page=gallery&gallery_id=<?php echo $gallery['id']; ?>'">
                        <div class="gallery-image-container">
                            <img 
                                src="<?php echo htmlspecialchars($gallery['cover_image']); ?>"
                                alt="<?php echo htmlspecialchars($gallery['name']); ?>"
                                class="gallery-image"
                            />
                        </div>
                        <div class="gallery-info">
                            <h3 class="gallery-name"><?php echo htmlspecialchars($gallery['name']); ?></h3>
                            <p class="gallery-photographer">by <?php echo htmlspecialchars($gallery['photographer']); ?></p>
                            <div class="gallery-meta">
                                <span><?php echo $gallery['date']; ?></span>
                                <span><?php echo $gallery['photos']; ?> photos</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>