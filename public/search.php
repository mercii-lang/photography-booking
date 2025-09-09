<?php
// Get search parameters
$event_type = $_GET['event_type'] ?? '';
$date = $_GET['date'] ?? '';
$location = $_GET['location'] ?? '';
$search_query = $_GET['q'] ?? '';
$min_price = $_GET['min_price'] ?? '';
$max_price = $_GET['max_price'] ?? '';
$rating = $_GET['rating'] ?? '';
$sort_by = $_GET['sort_by'] ?? 'rating';

// Extended photographer data for search results
$all_photographers = [
    [
        'id' => 1,
        'name' => 'Sarah Chen',
        'image' => 'https://images.unsplash.com/photo-1742821855272-981ae713ebd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcm9mZXNzaW9uYWwlMjBwaG90b2dyYXBoZXIlMjB3ZWRkaW5nJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzU3NDA1NTk4fDA&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.9,
        'reviews' => 127,
        'specialties' => ['Wedding', 'Portrait', 'Event'],
        'location' => 'New York, NY',
        'price_min' => 150,
        'price_max' => 250,
        'price_display' => '$150-250/hr',
        'featured' => true,
        'available_dates' => ['2024-03-15', '2024-03-20', '2024-04-10'],
        'bio' => 'Award-winning wedding photographer with 8+ years of experience capturing life\'s most precious moments.',
        'portfolio_count' => 45,
        'response_time' => '2 hours'
    ],
    [
        'id' => 2,
        'name' => 'Marcus Rivera',
        'image' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.8,
        'reviews' => 89,
        'specialties' => ['Corporate', 'Event', 'Headshots'],
        'location' => 'Los Angeles, CA',
        'price_min' => 120,
        'price_max' => 200,
        'price_display' => '$120-200/hr',
        'featured' => true,
        'available_dates' => ['2024-03-18', '2024-03-25', '2024-04-05'],
        'bio' => 'Corporate event specialist helping brands tell their story through powerful visual narratives.',
        'portfolio_count' => 38,
        'response_time' => '1 hour'
    ],
    [
        'id' => 3,
        'name' => 'Emma Thompson',
        'image' => 'https://images.unsplash.com/photo-1706824261828-6127b3beb64d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb3J0cmFpdCUyMHBob3RvZ3JhcGh5JTIwc3R1ZGlvJTIwcHJvZmVzc2lvbmFsfGVufDF8fHx8MTc1NzQwNTYwN3ww&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 5.0,
        'reviews' => 156,
        'specialties' => ['Fashion', 'Portrait', 'Commercial'],
        'location' => 'Miami, FL',
        'price_min' => 200,
        'price_max' => 350,
        'price_display' => '$200-350/hr',
        'featured' => true,
        'available_dates' => ['2024-03-22', '2024-04-01', '2024-04-15'],
        'bio' => 'Fashion and commercial photographer bringing creativity and professionalism to every shoot.',
        'portfolio_count' => 62,
        'response_time' => '30 minutes'
    ],
    [
        'id' => 4,
        'name' => 'David Kim',
        'image' => 'https://images.unsplash.com/photo-1751107996128-6a85dae2a7e0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwaG90b2dyYXBoZXIlMjBjYW1lcmElMjBlcXVpcG1lbnQlMjBwcm9mZXNzaW9uYWx8ZW58MXx8fHwxNzU3NDA1NjE1fDA&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.7,
        'reviews' => 203,
        'specialties' => ['Wedding', 'Family', 'Lifestyle'],
        'location' => 'Chicago, IL',
        'price_min' => 100,
        'price_max' => 180,
        'price_display' => '$100-180/hr',
        'featured' => false,
        'available_dates' => ['2024-03-20', '2024-03-28', '2024-04-08'],
        'bio' => 'Family and lifestyle photographer creating timeless memories for families across Chicago.',
        'portfolio_count' => 34,
        'response_time' => '3 hours'
    ],
    [
        'id' => 5,
        'name' => 'Lisa Zhang',
        'image' => 'https://images.unsplash.com/photo-1571538557366-4bdde003beb4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlbGVnYW50JTIwcGhvdG8lMjBnYWxsZXJ5JTIwZXhoaWJpdGlvbnxlbnwxfHx8fDE3NTc0MDU2MTJ8MA&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.9,
        'reviews' => 78,
        'specialties' => ['Art', 'Portrait', 'Creative'],
        'location' => 'San Francisco, CA',
        'price_min' => 180,
        'price_max' => 280,
        'price_display' => '$180-280/hr',
        'featured' => false,
        'available_dates' => ['2024-03-25', '2024-04-02', '2024-04-12'],
        'bio' => 'Creative portrait artist specializing in unique, artistic perspectives and innovative techniques.',
        'portfolio_count' => 29,
        'response_time' => '1 hour'
    ],
    [
        'id' => 6,
        'name' => 'Alex Rodriguez',
        'image' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=400',
        'rating' => 4.6,
        'reviews' => 94,
        'specialties' => ['Sports', 'Event', 'Action'],
        'location' => 'Denver, CO',
        'price_min' => 90,
        'price_max' => 150,
        'price_display' => '$90-150/hr',
        'featured' => false,
        'available_dates' => ['2024-03-30', '2024-04-05', '2024-04-18'],
        'bio' => 'High-energy sports and event photographer capturing motion and emotion in every frame.',
        'portfolio_count' => 41,
        'response_time' => '4 hours'
    ]
];

// Filter photographers based on search criteria
$filtered_photographers = array_filter($all_photographers, function($photographer) use ($event_type, $location, $search_query, $min_price, $max_price, $rating) {
    // Event type filter
    if (!empty($event_type)) {
        $matches_event = false;
        foreach ($photographer['specialties'] as $specialty) {
            if (stripos($specialty, $event_type) !== false) {
                $matches_event = true;
                break;
            }
        }
        if (!$matches_event) return false;
    }
    
    // Location filter
    if (!empty($location) && stripos($photographer['location'], $location) === false) {
        return false;
    }
    
    // Search query filter
    if (!empty($search_query)) {
        $searchable = $photographer['name'] . ' ' . $photographer['location'] . ' ' . implode(' ', $photographer['specialties']) . ' ' . $photographer['bio'];
        if (stripos($searchable, $search_query) === false) {
            return false;
        }
    }
    
    // Price range filter
    if (!empty($min_price) && $photographer['price_max'] < $min_price) {
        return false;
    }
    if (!empty($max_price) && $photographer['price_min'] > $max_price) {
        return false;
    }
    
    // Rating filter
    if (!empty($rating) && $photographer['rating'] < $rating) {
        return false;
    }
    
    return true;
});

// Sort photographers
usort($filtered_photographers, function($a, $b) use ($sort_by) {
    switch ($sort_by) {
        case 'price_low':
            return $a['price_min'] <=> $b['price_min'];
        case 'price_high':
            return $b['price_min'] <=> $a['price_min'];
        case 'reviews':
            return $b['reviews'] <=> $a['reviews'];
        case 'rating':
        default:
            return $b['rating'] <=> $a['rating'];
    }
});

$total_results = count($filtered_photographers);
?>

<div class="min-h-screen bg-gray-50">
    <!-- Search Header -->
    <div class="bg-white border-b border-gray-200 sticky top-20 z-40">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <!-- Search Results Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        <?php if ($total_results > 0): ?>
                            <?php echo $total_results; ?> Photographer<?php echo $total_results !== 1 ? 's' : ''; ?> Found
                        <?php else: ?>
                            No Photographers Found
                        <?php endif; ?>
                    </h1>
                    <?php if (!empty($event_type) || !empty($location) || !empty($search_query)): ?>
                    <p class="text-gray-600 mt-1">
                        <?php if (!empty($event_type)): ?>for <?php echo htmlspecialchars($event_type); ?> <?php endif; ?>
                        <?php if (!empty($location)): ?>in <?php echo htmlspecialchars($location); ?> <?php endif; ?>
                        <?php if (!empty($search_query)): ?>matching "<?php echo htmlspecialchars($search_query); ?>" <?php endif; ?>
                    </p>
                    <?php endif; ?>
                </div>
                <a href="?page=landing" class="btn btn-outline">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Home
                </a>
            </div>

            <!-- Enhanced Search Form -->
            <form method="GET" class="search-form-enhanced">
                <input type="hidden" name="page" value="search">
                
                <div class="search-grid">
                    <div class="search-group">
                        <label for="q">Search</label>
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input
                                type="text"
                                name="q"
                                id="q"
                                placeholder="Photographer name, style, specialty..."
                                value="<?php echo htmlspecialchars($search_query); ?>"
                                class="search-input"
                            />
                        </div>
                    </div>
                    
                    <div class="search-group">
                        <label for="event_type">Event Type</label>
                        <select name="event_type" id="event_type" class="search-select">
                            <option value="">All Events</option>
                            <option value="wedding" <?php echo $event_type === 'wedding' ? 'selected' : ''; ?>>Wedding</option>
                            <option value="portrait" <?php echo $event_type === 'portrait' ? 'selected' : ''; ?>>Portrait</option>
                            <option value="corporate" <?php echo $event_type === 'corporate' ? 'selected' : ''; ?>>Corporate</option>
                            <option value="family" <?php echo $event_type === 'family' ? 'selected' : ''; ?>>Family</option>
                            <option value="fashion" <?php echo $event_type === 'fashion' ? 'selected' : ''; ?>>Fashion</option>
                            <option value="event" <?php echo $event_type === 'event' ? 'selected' : ''; ?>>Event</option>
                        </select>
                    </div>
                    
                    <div class="search-group">
                        <label for="location">Location</label>
                        <div class="search-input-group">
                            <i class="fas fa-map-marker-alt search-icon"></i>
                            <input
                                type="text"
                                name="location"
                                id="location"
                                placeholder="City, State"
                                value="<?php echo htmlspecialchars($location); ?>"
                                class="search-input"
                            />
                        </div>
                    </div>
                    
                    <div class="search-group">
                        <label for="date">Date</label>
                        <input
                            type="date"
                            name="date"
                            id="date"
                            value="<?php echo htmlspecialchars($date); ?>"
                            class="search-input"
                        />
                    </div>
                </div>
                
                <!-- Advanced Filters -->
                <div class="advanced-filters">
                    <button type="button" class="filter-toggle" onclick="toggleAdvancedFilters()">
                        <i class="fas fa-sliders-h mr-2"></i>
                        Advanced Filters
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    
                    <div id="advancedFilters" class="filter-panel hidden">
                        <div class="filter-grid">
                            <div class="filter-group">
                                <label for="min_price">Min Price ($/hr)</label>
                                <input
                                    type="number"
                                    name="min_price"
                                    id="min_price"
                                    placeholder="50"
                                    value="<?php echo htmlspecialchars($min_price); ?>"
                                    class="filter-input"
                                />
                            </div>
                            
                            <div class="filter-group">
                                <label for="max_price">Max Price ($/hr)</label>
                                <input
                                    type="number"
                                    name="max_price"
                                    id="max_price"
                                    placeholder="500"
                                    value="<?php echo htmlspecialchars($max_price); ?>"
                                    class="filter-input"
                                />
                            </div>
                            
                            <div class="filter-group">
                                <label for="rating">Min Rating</label>
                                <select name="rating" id="rating" class="filter-select">
                                    <option value="">Any Rating</option>
                                    <option value="4.5" <?php echo $rating === '4.5' ? 'selected' : ''; ?>>4.5+ Stars</option>
                                    <option value="4.0" <?php echo $rating === '4.0' ? 'selected' : ''; ?>>4.0+ Stars</option>
                                    <option value="3.5" <?php echo $rating === '3.5' ? 'selected' : ''; ?>>3.5+ Stars</option>
                                </select>
                            </div>
                            
                            <div class="filter-group">
                                <label for="sort_by">Sort By</label>
                                <select name="sort_by" id="sort_by" class="filter-select">
                                    <option value="rating" <?php echo $sort_by === 'rating' ? 'selected' : ''; ?>>Highest Rated</option>
                                    <option value="reviews" <?php echo $sort_by === 'reviews' ? 'selected' : ''; ?>>Most Reviews</option>
                                    <option value="price_low" <?php echo $sort_by === 'price_low' ? 'selected' : ''; ?>>Price: Low to High</option>
                                    <option value="price_high" <?php echo $sort_by === 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="search-actions">
                    <button type="submit" class="btn btn-search">
                        <i class="fas fa-search mr-2"></i>
                        Search Photographers
                    </button>
                    <a href="?page=search" class="btn btn-outline">
                        Clear All
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Search Results -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <?php if ($total_results > 0): ?>
        <div class="photographer-results">
            <?php foreach ($filtered_photographers as $index => $photographer): ?>
            <div class="photographer-result-card fade-in-up" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                <div class="photographer-result-image">
                    <img 
                        src="<?php echo htmlspecialchars($photographer['image']); ?>"
                        alt="<?php echo htmlspecialchars($photographer['name']); ?>"
                        class="result-image"
                    />
                    <?php if ($photographer['featured']): ?>
                    <div class="featured-badge">
                        <i class="fas fa-star mr-1"></i>
                        Featured
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="photographer-result-content">
                    <div class="result-header">
                        <div class="result-title-section">
                            <h3 class="result-name"><?php echo htmlspecialchars($photographer['name']); ?></h3>
                            <div class="result-rating">
                                <div class="rating-stars">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?php echo $i <= floor($photographer['rating']) ? 'text-yellow-400' : 'text-gray-300'; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="rating-score"><?php echo $photographer['rating']; ?></span>
                                <span class="rating-count">(<?php echo $photographer['reviews']; ?> reviews)</span>
                            </div>
                        </div>
                        <div class="result-price">
                            <span class="price-amount"><?php echo htmlspecialchars($photographer['price_display']); ?></span>
                        </div>
                    </div>
                    
                    <div class="result-location">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <?php echo htmlspecialchars($photographer['location']); ?>
                    </div>
                    
                    <div class="result-specialties">
                        <?php foreach ($photographer['specialties'] as $specialty): ?>
                        <span class="specialty-tag"><?php echo htmlspecialchars($specialty); ?></span>
                        <?php endforeach; ?>
                    </div>
                    
                    <p class="result-bio"><?php echo htmlspecialchars($photographer['bio']); ?></p>
                    
                    <div class="result-meta">
                        <div class="meta-item">
                            <i class="fas fa-images mr-1"></i>
                            <?php echo $photographer['portfolio_count']; ?> photos
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock mr-1"></i>
                            Responds in <?php echo $photographer['response_time']; ?>
                        </div>
                        <?php if (!empty($date) && in_array($date, $photographer['available_dates'])): ?>
                        <div class="meta-item available">
                            <i class="fas fa-check-circle mr-1"></i>
                            Available on selected date
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="result-actions">
                        <button class="btn btn-outline" onclick="viewPortfolio(<?php echo $photographer['id']; ?>)">
                            <i class="fas fa-images mr-2"></i>
                            View Portfolio
                        </button>
                        <button class="btn btn-primary" onclick="bookPhotographer(<?php echo $photographer['id']; ?>)">
                            <i class="fas fa-calendar mr-2"></i>
                            Book Now
                        </button>
                        <button class="btn btn-ghost" onclick="contactPhotographer(<?php echo $photographer['id']; ?>)">
                            <i class="fas fa-message mr-2"></i>
                            Message
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Load More Button -->
        <?php if ($total_results > 6): ?>
        <div class="text-center mt-12">
            <button class="btn btn-outline" onclick="loadMoreResults()">
                <i class="fas fa-plus mr-2"></i>
                Load More Photographers
            </button>
        </div>
        <?php endif; ?>
        
        <?php else: ?>
        <!-- No Results -->
        <div class="no-results">
            <div class="no-results-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="no-results-title">No photographers found</h3>
            <p class="no-results-text">
                Try adjusting your search criteria or browse our
                <a href="?page=landing" class="text-teal-600 hover:text-teal-700 underline">featured photographers</a>
            </p>
            
            <div class="search-suggestions">
                <h4 class="suggestions-title">Search suggestions:</h4>
                <div class="suggestions-list">
                    <a href="?page=search&event_type=wedding" class="suggestion-tag">Wedding Photography</a>
                    <a href="?page=search&event_type=portrait" class="suggestion-tag">Portrait Sessions</a>
                    <a href="?page=search&event_type=corporate" class="suggestion-tag">Corporate Events</a>
                    <a href="?page=search&location=New York" class="suggestion-tag">New York</a>
                    <a href="?page=search&location=Los Angeles" class="suggestion-tag">Los Angeles</a>
                    <a href="?page=search&rating=4.5" class="suggestion-tag">Top Rated (4.5+)</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
/* Search page specific styles */
.search-form-enhanced {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.search-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.search-group {
    display: flex;
    flex-direction: column;
}

.search-group label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.search-input,
.search-select {
    height: 3rem;
    border-radius: 0.5rem;
    border: 1px solid #d1d5db;
    padding: 0 0.75rem;
    background: white;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.search-input:focus,
.search-select:focus {
    outline: none;
    border-color: var(--teal);
    box-shadow: 0 0 0 3px rgba(8, 128, 128, 0.1);
}

.search-input-group {
    position: relative;
}

.search-icon {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    z-index: 1;
}

.search-input-group .search-input {
    padding-left: 2.5rem;
}

.advanced-filters {
    border-top: 1px solid #e5e7eb;
    padding-top: 1.5rem;
    margin-bottom: 1.5rem;
}

.filter-toggle {
    background: none;
    border: none;
    color: var(--teal);
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    transition: color 0.3s ease;
}

.filter-toggle:hover {
    color: var(--teal-dark);
}

.filter-panel {
    margin-top: 1rem;
    padding: 1.5rem;
    background: #f9fafb;
    border-radius: 0.5rem;
    border: 1px solid #e5e7eb;
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}

.filter-group {
    display: flex;
    flex-direction: column;
}

.filter-group label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.filter-input,
.filter-select {
    height: 2.5rem;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
    padding: 0 0.75rem;
    background: white;
    transition: all 0.3s ease;
    font-size: 0.875rem;
}

.filter-input:focus,
.filter-select:focus {
    outline: none;
    border-color: var(--teal);
    box-shadow: 0 0 0 2px rgba(8, 128, 128, 0.1);
}

.search-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.photographer-results {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.photographer-result-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
    display: grid;
    grid-template-columns: 300px 1fr;
    min-height: 280px;
}

.photographer-result-card:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.photographer-result-image {
    position: relative;
    overflow: hidden;
}

.result-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.photographer-result-card:hover .result-image {
    transform: scale(1.05);
}

.photographer-result-content {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.result-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.result-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.5rem;
}

.result-rating {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.rating-stars {
    display: flex;
    gap: 0.125rem;
}

.rating-score {
    font-weight: 500;
    color: #374151;
}

.rating-count {
    color: #6b7280;
    font-size: 0.875rem;
}

.result-price {
    text-align: right;
}

.price-amount {
    font-size: 1.25rem;
    font-weight: 700;
    color: #111827;
}

.result-location {
    display: flex;
    align-items: center;
    color: #6b7280;
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.result-specialties {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.specialty-tag {
    background: rgba(8, 128, 128, 0.1);
    color: var(--teal-dark);
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
}

.result-bio {
    color: #6b7280;
    font-size: 0.875rem;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.result-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.meta-item {
    display: flex;
    align-items: center;
}

.meta-item.available {
    color: #16a34a;
    font-weight: 500;
}

.result-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.btn-ghost {
    background: transparent;
    border: none;
    color: var(--teal);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-ghost:hover {
    background: rgba(8, 128, 128, 0.1);
    color: var(--teal-dark);
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

.no-results-icon {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 1.5rem;
}

.no-results-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 1rem;
}

.no-results-text {
    color: #6b7280;
    font-size: 1.125rem;
    margin-bottom: 2rem;
}

.search-suggestions {
    margin-top: 2rem;
}

.suggestions-title {
    font-weight: 500;
    color: #374151;
    margin-bottom: 1rem;
}

.suggestions-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    justify-content: center;
}

.suggestion-tag {
    background: #f3f4f6;
    color: #374151;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.suggestion-tag:hover {
    background: var(--teal);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .search-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .filter-grid {
        grid-template-columns: 1fr;
    }
    
    .search-actions {
        flex-direction: column;
    }
    
    .photographer-result-card {
        grid-template-columns: 1fr;
    }
    
    .photographer-result-image {
        height: 200px;
    }
    
    .photographer-result-content {
        padding: 1.5rem;
    }
    
    .result-header {
        flex-direction: column;
        gap: 1rem;
    }
    
    .result-actions {
        flex-direction: column;
    }
    
    .result-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>

<script>
function toggleAdvancedFilters() {
    const panel = document.getElementById('advancedFilters');
    const toggle = document.querySelector('.filter-toggle i:last-child');
    
    if (panel.classList.contains('hidden')) {
        panel.classList.remove('hidden');
        toggle.style.transform = 'rotate(180deg)';
    } else {
        panel.classList.add('hidden');
        toggle.style.transform = 'rotate(0deg)';
    }
}

function viewPortfolio(photographerId) {
    showNotification(`Viewing portfolio for photographer #${photographerId}`, 'info');
    // In a real application, this would navigate to the photographer's portfolio page
}

function bookPhotographer(photographerId) {
    window.location.href = `?page=client-dashboard&photographer_id=${photographerId}&action=book`;
}

function contactPhotographer(photographerId) {
    showNotification(`Opening chat with photographer #${photographerId}`, 'info');
    // In a real application, this would open a messaging interface
}

function loadMoreResults() {
    showNotification('Loading more results...', 'info');
    // In a real application, this would load additional results via AJAX
}

// Auto-submit form when filters change
document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('select[name="sort_by"], select[name="rating"]');
    selects.forEach(select => {
        select.addEventListener('change', function() {
            // Optional: Auto-submit on filter change
            // this.form.submit();
        });
    });
});
</script>