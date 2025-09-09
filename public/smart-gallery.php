<?php
// Mock photo data
$photos = [
    [
        'id' => '1',
        'src' => 'https://images.unsplash.com/photo-1742821855272-981ae713ebd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcm9mZXNzaW9uYWwlMjBwaG90b2dyYXBoZXIlMjB3ZWRkaW5nJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzU3NDA1NTk4fDA&ixlib=rb-4.1.0&q=80&w=600',
        'title' => 'Ceremony Moment',
        'photographer' => 'Sarah Chen',
        'event' => 'Jessica & Mark Wedding',
        'date' => '2024-02-15',
        'location' => 'Brooklyn Botanical Garden',
        'tags' => ['wedding', 'ceremony', 'emotional', 'outdoor'],
        'faces' => ['Jessica', 'Mark'],
        'mood' => 'joyful',
        'likes' => 47,
        'watermarked' => true,
        'featured' => true,
        'category' => 'portrait'
    ],
    [
        'id' => '2',
        'src' => 'https://images.unsplash.com/photo-1686828366032-aa2a424b5f4c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjB3ZWRkaW5nJTIwcGhvdG9ncmFwaHklMjBiYWNrZHJvcHxlbnwxfHx8fDE3NTc0MDU2MDF8MA&ixlib=rb-4.1.0&q=80&w=600',
        'title' => 'Elegant Reception',
        'photographer' => 'Sarah Chen',
        'event' => 'Jessica & Mark Wedding',
        'date' => '2024-02-15',
        'location' => 'Brooklyn Botanical Garden',
        'tags' => ['wedding', 'reception', 'elegant', 'golden hour'],
        'faces' => ['Jessica', 'Mark', 'Family'],
        'mood' => 'romantic',
        'likes' => 63,
        'watermarked' => true,
        'featured' => false,
        'category' => 'landscape'
    ],
    [
        'id' => '3',
        'src' => 'https://images.unsplash.com/photo-1705544363562-cdf94dd458cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxldmVudCUyMHBob3RvZ3JhcGh5JTIwY29ycG9yYXRlfGVufDF8fHx8MTc1NzQwNTYwNHww&ixlib=rb-4.1.0&q=80&w=600',
        'title' => 'Corporate Team Photo',
        'photographer' => 'Marcus Rivera',
        'event' => 'TechStart Product Launch',
        'date' => '2024-02-20',
        'location' => 'Manhattan Conference Center',
        'tags' => ['corporate', 'team', 'professional', 'indoor'],
        'faces' => ['Team Members'],
        'mood' => 'professional',
        'likes' => 29,
        'watermarked' => true,
        'featured' => false,
        'category' => 'group'
    ],
    [
        'id' => '4',
        'src' => 'https://images.unsplash.com/photo-1706824261828-6127b3beb64d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwb3J0cmFpdCUyMHBob3RvZ3JhcGh5JTIwc3R1ZGlvJTIwcHJvZmVzc2lvbmFsfGVufDF8fHx8MTc1NzQwNTYwN3ww&ixlib=rb-4.1.0&q=80&w=600',
        'title' => 'Family Portrait',
        'photographer' => 'Emma Thompson',
        'event' => 'Johnson Family Session',
        'date' => '2024-02-10',
        'location' => 'Central Park',
        'tags' => ['family', 'portrait', 'outdoor', 'natural'],
        'faces' => ['Parents', 'Children'],
        'mood' => 'happy',
        'likes' => 81,
        'watermarked' => true,
        'featured' => true,
        'category' => 'portrait'
    ],
    [
        'id' => '5',
        'src' => 'https://images.unsplash.com/photo-1751107996128-6a85dae2a7e0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwaG90b2dyYXBoZXIlMjBjYW1lcmElMjBlcXVpcG1lbnQlMjBwcm9mZXNzaW9uYWx8ZW58MXx8fHwxNzU3NDA1NjE1fDA&ixlib=rb-4.1.0&q=80&w=600',
        'title' => 'Behind the Scenes',
        'photographer' => 'David Kim',
        'event' => 'Fashion Shoot',
        'date' => '2024-02-05',
        'location' => 'Studio Downtown',
        'tags' => ['fashion', 'studio', 'equipment', 'candid'],
        'faces' => ['Model', 'Photographer'],
        'mood' => 'creative',
        'likes' => 34,
        'watermarked' => true,
        'featured' => false,
        'category' => 'candid'
    ],
    [
        'id' => '6',
        'src' => 'https://images.unsplash.com/photo-1571538557366-4bdde003beb4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlbGVnYW50JTIwcGhvdG8lMjBnYWxsZXJ5JTIwZXhoaWJpdGlvbnxlbnwxfHx8fDE3NTc0MDU2MTJ8MA&ixlib=rb-4.1.0&q=80&w=600',
        'title' => 'Artistic Detail',
        'photographer' => 'Lisa Zhang',
        'event' => 'Art Gallery Opening',
        'date' => '2024-01-30',
        'location' => 'Modern Art Museum',
        'tags' => ['art', 'detail', 'black and white', 'abstract'],
        'faces' => [],
        'mood' => 'artistic',
        'likes' => 56,
        'watermarked' => true,
        'featured' => false,
        'category' => 'detail'
    ]
];

$highlight_reels = [
    [
        'id' => '1',
        'title' => 'Wedding Day Highlights',
        'description' => 'The most beautiful moments from Jessica & Mark\'s special day',
        'photos' => array_slice($photos, 0, 2),
        'duration' => '2:30',
        'thumbnail' => $photos[0]['src']
    ],
    [
        'id' => '2',
        'title' => 'Family Memories',
        'description' => 'Capturing love and laughter in every frame',
        'photos' => array_slice($photos, 3, 1),
        'duration' => '1:45',
        'thumbnail' => $photos[3]['src']
    ]
];

// Get filters from URL parameters
$search_term = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$mood = $_GET['mood'] ?? '';
$view_mode = $_GET['view'] ?? 'grid3';

// Get all unique tags and moods
$all_tags = array_unique(array_merge(...array_column($photos, 'tags')));
$all_moods = array_unique(array_column($photos, 'mood'));

// Filter photos based on search criteria
$filtered_photos = array_filter($photos, function($photo) use ($search_term, $category, $mood) {
    $matches_search = empty($search_term) ||
        stripos($photo['title'], $search_term) !== false ||
        array_filter($photo['tags'], fn($tag) => stripos($tag, $search_term) !== false) ||
        array_filter($photo['faces'], fn($face) => stripos($face, $search_term) !== false);
    
    $matches_category = empty($category) || $photo['category'] === $category;
    $matches_mood = empty($mood) || $photo['mood'] === $mood;

    return $matches_search && $matches_category && $matches_mood;
});
?>

<div class="min-h-screen bg-white">
    <!-- Header -->
    <div class="bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900">Smart Gallery</h1>
                    <p class="text-gray-600 mt-1">AI-powered photo organization and discovery</p>
                </div>
                <a href="?page=client-dashboard" class="btn btn-outline">
                    Back to Dashboard
                </a>
            </div>

            <!-- Search and Filters -->
            <form method="GET" class="gallery-filters">
                <input type="hidden" name="page" value="gallery">
                
                <div class="filter-group">
                    <div class="search-input-group">
                        <i class="fas fa-search search-icon"></i>
                        <input
                            type="text"
                            name="search"
                            placeholder="Search by faces, places, tags..."
                            value="<?php echo htmlspecialchars($search_term); ?>"
                            class="search-input"
                        />
                    </div>
                </div>
                
                <div class="filter-group">
                    <select name="category" class="filter-select">
                        <option value="">All Categories</option>
                        <option value="portrait" <?php echo $category === 'portrait' ? 'selected' : ''; ?>>Portrait</option>
                        <option value="landscape" <?php echo $category === 'landscape' ? 'selected' : ''; ?>>Landscape</option>
                        <option value="group" <?php echo $category === 'group' ? 'selected' : ''; ?>>Group</option>
                        <option value="detail" <?php echo $category === 'detail' ? 'selected' : ''; ?>>Detail</option>
                        <option value="candid" <?php echo $category === 'candid' ? 'selected' : ''; ?>>Candid</option>
                    </select>
                </div>

                <div class="filter-group">
                    <select name="mood" class="filter-select">
                        <option value="">All Moods</option>
                        <?php foreach ($all_moods as $mood_option): ?>
                        <option value="<?php echo htmlspecialchars($mood_option); ?>" <?php echo $mood === $mood_option ? 'selected' : ''; ?>>
                            <?php echo ucfirst($mood_option); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <div class="view-controls">
                        <button type="button" class="view-btn <?php echo $view_mode === 'grid3' ? 'active' : ''; ?>" onclick="setViewMode('grid3')">
                            <i class="fas fa-th"></i>
                        </button>
                        <button type="button" class="view-btn <?php echo $view_mode === 'grid2' ? 'active' : ''; ?>" onclick="setViewMode('grid2')">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button type="button" class="view-btn <?php echo $view_mode === 'list' ? 'active' : ''; ?>" onclick="setViewMode('list')">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>

                <div class="filter-group">
                    <button type="submit" class="btn btn-search">
                        <i class="fas fa-search mr-2"></i>
                        Search
                    </button>
                </div>
            </form>

            <!-- Tag Filters -->
            <div class="tag-filters">
                <?php foreach (array_slice($all_tags, 0, 8) as $tag): ?>
                <button type="button" class="tag-filter" onclick="toggleTag('<?php echo htmlspecialchars($tag); ?>')">
                    <i class="fas fa-tag mr-1"></i>
                    <?php echo htmlspecialchars($tag); ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Highlight Reels -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Highlight Reels</h2>
            <div class="highlight-reels-grid">
                <?php foreach ($highlight_reels as $reel): ?>
                <div class="highlight-reel-card" onclick="playReel('<?php echo $reel['id']; ?>')">
                    <div class="reel-thumbnail-container">
                        <img 
                            src="<?php echo htmlspecialchars($reel['thumbnail']); ?>"
                            alt="<?php echo htmlspecialchars($reel['title']); ?>"
                            class="reel-thumbnail"
                        />
                        <div class="reel-play-overlay">
                            <div class="reel-play-button">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="reel-duration">
                            <?php echo htmlspecialchars($reel['duration']); ?>
                        </div>
                    </div>
                    <div class="reel-info">
                        <h3 class="reel-title"><?php echo htmlspecialchars($reel['title']); ?></h3>
                        <p class="reel-description"><?php echo htmlspecialchars($reel['description']); ?></p>
                        <div class="reel-meta">
                            <span><?php echo count($reel['photos']); ?> photos</span>
                            <button class="btn btn-sm btn-teal">
                                <i class="fas fa-play mr-1"></i>
                                Play
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Photo Grid -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-900">
                All Photos (<?php echo count($filtered_photos); ?>)
            </h2>
            <div id="selectedCount" class="hidden">
                <span class="text-sm text-gray-600">0 selected</span>
                <button class="btn btn-sm btn-outline ml-2" onclick="clearSelection()">
                    Clear Selection
                </button>
                <button class="btn btn-sm btn-primary ml-2" onclick="downloadSelected()">
                    <i class="fas fa-download mr-1"></i>
                    Download
                </button>
            </div>
        </div>

        <div class="photo-grid <?php echo $view_mode; ?>">
            <?php if (empty($filtered_photos)): ?>
            <div class="no-photos">
                <i class="fas fa-search no-photos-icon"></i>
                <h3 class="no-photos-title">No photos found</h3>
                <p class="no-photos-text">Try adjusting your search criteria or filters</p>
            </div>
            <?php else: ?>
                <?php foreach ($filtered_photos as $photo): ?>
                <div class="photo-card fade-in-up" data-photo-id="<?php echo $photo['id']; ?>">
                    <?php if ($view_mode === 'list'): ?>
                    <!-- List View -->
                    <div class="photo-list-item">
                        <div class="photo-list-image-container">
                            <input type="checkbox" class="photo-checkbox" onchange="togglePhotoSelection('<?php echo $photo['id']; ?>')">
                            <img 
                                src="<?php echo htmlspecialchars($photo['src']); ?>"
                                alt="<?php echo htmlspecialchars($photo['title']); ?>"
                                class="photo-list-image"
                                onclick="openPhotoModal('<?php echo $photo['id']; ?>')"
                            />
                        </div>
                        <div class="photo-list-info">
                            <h3 class="photo-list-title"><?php echo htmlspecialchars($photo['title']); ?></h3>
                            <p class="photo-list-event"><?php echo htmlspecialchars($photo['event']); ?></p>
                            <div class="photo-list-tags">
                                <?php foreach (array_slice($photo['tags'], 0, 3) as $tag): ?>
                                <span class="tag-badge"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="photo-list-meta">
                                <div class="photo-meta-left">
                                    <span class="photo-meta-item">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <?php echo htmlspecialchars($photo['date']); ?>
                                    </span>
                                    <span class="photo-meta-item">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        <?php echo htmlspecialchars($photo['location']); ?>
                                    </span>
                                </div>
                                <div class="photo-actions">
                                    <button class="photo-action-btn" onclick="toggleLike('<?php echo $photo['id']; ?>')">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="photo-action-btn" onclick="downloadPhoto('<?php echo $photo['id']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <!-- Grid View -->
                    <div class="photo-grid-item">
                        <div class="photo-image-container">
                            <input type="checkbox" class="photo-checkbox" onchange="togglePhotoSelection('<?php echo $photo['id']; ?>')">
                            <img 
                                src="<?php echo htmlspecialchars($photo['src']); ?>"
                                alt="<?php echo htmlspecialchars($photo['title']); ?>"
                                class="photo-image"
                                onclick="openPhotoModal('<?php echo $photo['id']; ?>')"
                            />
                            <?php if ($photo['featured']): ?>
                            <div class="featured-badge">
                                <i class="fas fa-star mr-1"></i>
                                Featured
                            </div>
                            <?php endif; ?>
                            <?php if ($photo['watermarked']): ?>
                            <div class="watermark-badge">
                                Watermarked
                            </div>
                            <?php endif; ?>
                            <div class="photo-overlay">
                                <div class="photo-overlay-actions">
                                    <button class="overlay-action-btn" onclick="toggleLike('<?php echo $photo['id']; ?>')">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="overlay-action-btn" onclick="downloadPhoto('<?php echo $photo['id']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="overlay-action-btn" onclick="sharePhoto('<?php echo $photo['id']; ?>')">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="photo-grid-info">
                            <h3 class="photo-grid-title"><?php echo htmlspecialchars($photo['title']); ?></h3>
                            <p class="photo-grid-event"><?php echo htmlspecialchars($photo['event']); ?></p>
                            <div class="photo-grid-tags">
                                <?php foreach (array_slice($photo['tags'], 0, 2) as $tag): ?>
                                <span class="tag-badge"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="photo-grid-meta">
                                <span class="photo-meta-item">
                                    <i class="fas fa-heart mr-1"></i>
                                    <?php echo $photo['likes']; ?>
                                </span>
                                <span class="photo-meta-item">
                                    <i class="fas fa-smile mr-1"></i>
                                    <?php echo htmlspecialchars($photo['mood']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Photo Modal -->
<div id="photoModal" class="photo-modal hidden">
    <div class="modal-overlay" onclick="closePhotoModal()"></div>
    <div class="modal-content">
        <div class="modal-image-container">
            <img id="modalImage" src="" alt="" class="modal-image">
            <div class="modal-actions">
                <button class="modal-action-btn" onclick="toggleModalLike()">
                    <i class="fas fa-heart"></i>
                </button>
                <button class="modal-action-btn" onclick="downloadModalPhoto()">
                    <i class="fas fa-download"></i>
                </button>
                <button class="modal-action-btn" onclick="shareModalPhoto()">
                    <i class="fas fa-share"></i>
                </button>
            </div>
        </div>
        
        <div class="modal-info">
            <div class="modal-header">
                <h2 id="modalTitle"></h2>
                <button class="modal-close-btn" onclick="closePhotoModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="modal-details">
                <div class="modal-section">
                    <h4>Event Details</h4>
                    <p id="modalEvent"></p>
                    <div class="modal-meta">
                        <div class="modal-meta-item">
                            <i class="fas fa-calendar mr-2"></i>
                            <span id="modalDate"></span>
                        </div>
                        <div class="modal-meta-item">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span id="modalLocation"></span>
                        </div>
                        <div class="modal-meta-item">
                            <i class="fas fa-user mr-2"></i>
                            <span id="modalPhotographer"></span>
                        </div>
                    </div>
                </div>
                
                <div class="modal-section">
                    <h4>People in Photo</h4>
                    <div id="modalFaces" class="modal-tags"></div>
                </div>
                
                <div class="modal-section">
                    <h4>Tags</h4>
                    <div id="modalTags" class="modal-tags"></div>
                </div>
                
                <div class="modal-section">
                    <h4>Mood</h4>
                    <div class="mood-badge">
                        <i class="fas fa-smile mr-1"></i>
                        <span id="modalMood"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let selectedPhotos = [];
let currentPhotoData = {};

// Photo data for JavaScript access
const photoData = <?php echo json_encode($photos); ?>;

function setViewMode(mode) {
    const url = new URL(window.location);
    url.searchParams.set('view', mode);
    window.location = url;
}

function toggleTag(tag) {
    const url = new URL(window.location);
    const currentSearch = url.searchParams.get('search') || '';
    const newSearch = currentSearch.includes(tag) ? currentSearch : `${currentSearch} ${tag}`.trim();
    url.searchParams.set('search', newSearch);
    window.location = url;
}

function togglePhotoSelection(photoId) {
    const index = selectedPhotos.indexOf(photoId);
    if (index > -1) {
        selectedPhotos.splice(index, 1);
    } else {
        selectedPhotos.push(photoId);
    }
    updateSelectionUI();
}

function updateSelectionUI() {
    const selectedCount = document.getElementById('selectedCount');
    const countSpan = selectedCount.querySelector('span');
    
    if (selectedPhotos.length > 0) {
        selectedCount.classList.remove('hidden');
        countSpan.textContent = `${selectedPhotos.length} selected`;
    } else {
        selectedCount.classList.add('hidden');
    }
}

function clearSelection() {
    selectedPhotos = [];
    document.querySelectorAll('.photo-checkbox').forEach(cb => cb.checked = false);
    updateSelectionUI();
}

function downloadSelected() {
    if (selectedPhotos.length === 0) {
        showNotification('Please select photos to download', 'warning');
        return;
    }
    showNotification(`Downloading ${selectedPhotos.length} photos...`, 'success');
    // Here you would implement the actual download logic
}

function openPhotoModal(photoId) {
    const photo = photoData.find(p => p.id === photoId);
    if (!photo) return;
    
    currentPhotoData = photo;
    
    // Update modal content
    document.getElementById('modalImage').src = photo.src;
    document.getElementById('modalTitle').textContent = photo.title;
    document.getElementById('modalEvent').textContent = photo.event;
    document.getElementById('modalDate').textContent = photo.date;
    document.getElementById('modalLocation').textContent = photo.location;
    document.getElementById('modalPhotographer').textContent = photo.photographer;
    document.getElementById('modalMood').textContent = photo.mood;
    
    // Update faces
    const facesContainer = document.getElementById('modalFaces');
    facesContainer.innerHTML = photo.faces.map(face => 
        `<span class="modal-tag blue">${face}</span>`
    ).join('');
    
    // Update tags
    const tagsContainer = document.getElementById('modalTags');
    tagsContainer.innerHTML = photo.tags.map(tag => 
        `<span class="modal-tag">${tag}</span>`
    ).join('');
    
    // Show modal
    document.getElementById('photoModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closePhotoModal() {
    document.getElementById('photoModal').classList.add('hidden');
    document.body.style.overflow = '';
    currentPhotoData = {};
}

function toggleLike(photoId) {
    const heartBtn = event.target.closest('button');
    const heart = heartBtn.querySelector('i');
    
    if (heart.classList.contains('liked')) {
        heart.classList.remove('liked');
        heart.style.color = '';
        showNotification('Photo unliked', 'info');
    } else {
        heart.classList.add('liked');
        heart.style.color = '#ef4444';
        showNotification('Photo liked!', 'success');
    }
}

function downloadPhoto(photoId) {
    const photo = photoData.find(p => p.id === photoId);
    if (photo) {
        showNotification(`Downloading "${photo.title}"...`, 'success');
        // Here you would implement the actual download logic
    }
}

function sharePhoto(photoId) {
    const photo = photoData.find(p => p.id === photoId);
    if (photo) {
        if (navigator.share) {
            navigator.share({
                title: photo.title,
                text: `Check out this photo from ${photo.event}`,
                url: window.location.href
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(window.location.href);
            showNotification('Photo link copied to clipboard!', 'success');
        }
    }
}

function playReel(reelId) {
    showNotification('Playing highlight reel...', 'info');
    // Here you would implement the video player logic
}

// Modal actions
function toggleModalLike() {
    toggleLike(currentPhotoData.id);
}

function downloadModalPhoto() {
    downloadPhoto(currentPhotoData.id);
}

function shareModalPhoto() {
    sharePhoto(currentPhotoData.id);
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePhotoModal();
    }
});
</script>

<style>
/* Gallery-specific styles */
.gallery-filters {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr auto auto;
    gap: 1rem;
    align-items: end;
}

.filter-group {
    display: flex;
    flex-direction: column;
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

.search-input {
    height: 3rem;
    border-radius: 0.5rem;
    border: 1px solid #d1d5db;
    padding: 0 0.75rem 0 2.5rem;
    background: white;
    transition: all 0.3s ease;
    font-size: 1rem;
    width: 100%;
}

.search-input:focus {
    outline: none;
    border-color: var(--teal);
    box-shadow: 0 0 0 3px rgba(8, 128, 128, 0.1);
}

.filter-select {
    height: 3rem;
    border-radius: 0.5rem;
    border: 1px solid #d1d5db;
    padding: 0 0.75rem;
    background: white;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.filter-select:focus {
    outline: none;
    border-color: var(--teal);
    box-shadow: 0 0 0 3px rgba(8, 128, 128, 0.1);
}

.view-controls {
    display: flex;
    gap: 0.25rem;
}

.view-btn {
    height: 3rem;
    width: 3rem;
    border: 1px solid #d1d5db;
    background: white;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.view-btn:hover {
    background: #f9fafb;
}

.view-btn.active {
    background: var(--teal);
    color: white;
    border-color: var(--teal);
}

.tag-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1rem;
}

.tag-filter {
    background: white;
    border: 1px solid #d1d5db;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tag-filter:hover {
    background: var(--teal);
    color: white;
    border-color: var(--teal);
}

/* Highlight Reels */
.highlight-reels-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 1.5rem;
}

.highlight-reel-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
}

.highlight-reel-card:hover {
    transform: scale(1.02);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.reel-thumbnail-container {
    aspect-ratio: 16 / 9;
    position: relative;
    overflow: hidden;
}

.reel-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.highlight-reel-card:hover .reel-thumbnail {
    transform: scale(1.1);
}

.reel-play-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.highlight-reel-card:hover .reel-play-overlay {
    opacity: 1;
}

.reel-play-button {
    width: 4rem;
    height: 4rem;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #111827;
}

.reel-duration {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.875rem;
}

.reel-info {
    padding: 1rem;
}

.reel-title {
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.5rem;
}

.reel-description {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.75rem;
}

.reel-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: #6b7280;
}

/* Photo Grid */
.photo-grid {
    display: grid;
    gap: 1.5rem;
}

.photo-grid.grid3 {
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}

.photo-grid.grid2 {
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
}

.photo-grid.list {
    grid-template-columns: 1fr;
}

.photo-card {
    animation: fadeInUp 0.6s ease-out forwards;
}

.photo-grid-item {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.photo-grid-item:hover {
    transform: scale(1.02);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.photo-image-container {
    aspect-ratio: 1;
    position: relative;
    overflow: hidden;
}

.photo-checkbox {
    position: absolute;
    top: 0.75rem;
    left: 0.75rem;
    z-index: 10;
    width: 1.25rem;
    height: 1.25rem;
    accent-color: var(--teal);
}

.photo-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.5s ease;
}

.photo-grid-item:hover .photo-image {
    transform: scale(1.1);
}

.featured-badge {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    background: #fbbf24;
    color: #000;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    font-weight: 500;
    z-index: 5;
}

.watermark-badge {
    position: absolute;
    bottom: 0.75rem;
    right: 0.75rem;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
}

.photo-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.photo-grid-item:hover .photo-overlay {
    opacity: 1;
}

.photo-overlay-actions {
    display: flex;
    gap: 0.5rem;
}

.overlay-action-btn {
    width: 2.5rem;
    height: 2.5rem;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #111827;
}

.overlay-action-btn:hover {
    background: white;
    transform: scale(1.1);
}

.photo-grid-info {
    padding: 1rem;
}

.photo-grid-title {
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.25rem;
}

.photo-grid-event {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.photo-grid-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.25rem;
    margin-bottom: 0.75rem;
}

.tag-badge {
    background: rgba(8, 128, 128, 0.1);
    color: var(--teal-dark);
    padding: 0.125rem 0.375rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.photo-grid-meta {
    display: flex;
    justify-content: space-between;
    font-size: 0.875rem;
    color: #6b7280;
}

.photo-meta-item {
    display: flex;
    align-items: center;
}

/* List View */
.photo-list-item {
    background: white;
    padding: 1rem;
    border-radius: 0.75rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}

.photo-list-image-container {
    position: relative;
    flex-shrink: 0;
}

.photo-list-image {
    width: 5rem;
    height: 5rem;
    border-radius: 0.5rem;
    object-fit: cover;
    cursor: pointer;
}

.photo-list-info {
    flex: 1;
}

.photo-list-title {
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.25rem;
}

.photo-list-event {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.photo-list-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.25rem;
    margin-bottom: 0.5rem;
}

.photo-list-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: #6b7280;
}

.photo-meta-left {
    display: flex;
    gap: 1rem;
}

.photo-actions {
    display: flex;
    gap: 0.5rem;
}

.photo-action-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.25rem;
    color: #6b7280;
    transition: color 0.3s ease;
}

.photo-action-btn:hover {
    color: var(--teal);
}

/* No Photos */
.no-photos {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
}

.no-photos-icon {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 1rem;
}

.no-photos-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.5rem;
}

.no-photos-text {
    color: #6b7280;
}

/* Photo Modal */
.photo-modal {
    position: fixed;
    inset: 0;
    z-index: 50;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.75);
}

.modal-content {
    background: white;
    border-radius: 1rem;
    max-width: 64rem;
    max-height: 90vh;
    width: 100%;
    display: grid;
    grid-template-columns: 2fr 1fr;
    overflow: hidden;
    position: relative;
    z-index: 10;
}

.modal-image-container {
    position: relative;
    background: #000;
}

.modal-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.modal-actions {
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: flex;
    gap: 0.5rem;
}

.modal-action-btn {
    width: 2.5rem;
    height: 2.5rem;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #111827;
}

.modal-action-btn:hover {
    background: white;
    transform: scale(1.1);
}

.modal-info {
    padding: 1.5rem;
    overflow-y: auto;
    background: #f9fafb;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.modal-close-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.5rem;
    color: #6b7280;
    transition: color 0.3s ease;
}

.modal-close-btn:hover {
    color: #111827;
}

.modal-section {
    margin-bottom: 1.5rem;
}

.modal-section h4 {
    font-weight: 500;
    color: #111827;
    margin-bottom: 0.5rem;
}

.modal-section p {
    color: #6b7280;
}

.modal-meta {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 0.5rem;
}

.modal-meta-item {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
    color: #6b7280;
}

.modal-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.modal-tag {
    background: #e5e7eb;
    color: #374151;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.modal-tag.blue {
    background: rgba(59, 130, 246, 0.1);
    color: #1d4ed8;
}

.mood-badge {
    background: rgba(147, 51, 234, 0.1);
    color: #7c2d12;
    padding: 0.5rem;
    border-radius: 0.5rem;
    display: inline-flex;
    align-items: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .gallery-filters {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    .highlight-reels-grid {
        grid-template-columns: 1fr;
    }
    
    .photo-grid.grid3,
    .photo-grid.grid2 {
        grid-template-columns: 1fr;
    }
    
    .modal-content {
        grid-template-columns: 1fr;
        max-height: 95vh;
    }
    
    .photo-list-item {
        flex-direction: column;
    }
    
    .photo-list-meta {
        flex-direction: column;
        gap: 0.5rem;
        align-items: flex-start;
    }
    
    .photo-meta-left {
        flex-direction: column;
        gap: 0.25rem;
    }
}
</style>