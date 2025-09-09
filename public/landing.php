<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden">
        <div class="absolute inset-0">
            <img 
                src="https://images.unsplash.com/photo-1686828366032-aa2a424b5f4c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjB3ZWRkaW5nJTIwcGhvdG9ncmFwaHklMjBiYWNrZHJvcHxlbnwxfHx8fDE3NTc0MDU2MDF8MA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="Luxury wedding photography"
                class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center h-full px-4">
            <div class="text-center max-w-4xl mx-auto text-white">
                <h1 class="hero-title fade-in-up">
                    Capture Your
                    <span class="block font-medium bg-gradient-to-r from-yellow-400 via-amber-400 to-yellow-600 bg-clip-text text-transparent">
                        Perfect Moment
                    </span>
                </h1>
                
                <p class="hero-subtitle fade-in-up-delay-200">
                    Connect with professional photographers for weddings, events, portraits, and more.
                    <br />Premium quality. Seamless booking. Unforgettable memories.
                </p>

                <div class="fade-in-up-delay-400">
                    <a href="?page=client-dashboard" class="btn btn-hero">
                        <i class="fas fa-camera mr-2"></i>
                        Book Your Photographer
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white scroll-indicator">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
        </div>
    </section>

    <!-- Quick Search Bar -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="search-card fade-in-up">
                <h2 class="section-title text-center mb-8 text-gray-900">
                    Find Your Perfect Photographer
                </h2>
                
                <form class="search-form" action="?page=search" method="GET">
                    <input type="hidden" name="page" value="search">
                    
                    <div class="form-group">
                        <label for="event_type">Event Type</label>
                        <select name="event_type" id="event_type" class="form-select">
                            <option value="">Select event type</option>
                            <option value="wedding">Wedding</option>
                            <option value="portrait">Portrait Session</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="family">Family Photos</option>
                            <option value="fashion">Fashion Shoot</option>
                            <option value="headshots">Professional Headshots</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location</label>
                        <div class="input-with-icon">
                            <i class="fas fa-map-marker-alt input-icon"></i>
                            <input type="text" name="location" id="location" placeholder="City, State" class="form-input pl-10">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-search w-full">
                            <i class="fas fa-search mr-2"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Photographers -->
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="section-title mb-4 text-gray-900">
                    Featured Photographers
                </h2>
                <p class="section-subtitle max-w-2xl mx-auto">
                    Meet our top-rated professionals who bring your vision to life with exceptional artistry and skill.
                </p>
            </div>

            <div class="photographer-grid">
                <?php foreach (array_filter($photographers, fn($p) => $p['featured']) as $index => $photographer): ?>
                <div class="photographer-card fade-in-up" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                    <div class="photographer-image-container">
                        <img 
                            src="<?php echo htmlspecialchars($photographer['image']); ?>"
                            alt="<?php echo htmlspecialchars($photographer['name']); ?>"
                            class="photographer-image"
                        />
                    </div>
                    
                    <div class="photographer-info">
                        <div class="photographer-header">
                            <h3 class="photographer-name"><?php echo htmlspecialchars($photographer['name']); ?></h3>
                            <div class="photographer-rating">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="rating-score"><?php echo $photographer['rating']; ?></span>
                                <span class="rating-count">(<?php echo $photographer['reviews']; ?>)</span>
                            </div>
                        </div>
                        
                        <div class="photographer-location">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            <span><?php echo htmlspecialchars($photographer['location']); ?></span>
                        </div>
                        
                        <div class="photographer-specialties">
                            <?php foreach ($photographer['specialties'] as $specialty): ?>
                            <span class="specialty-badge"><?php echo htmlspecialchars($specialty); ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="photographer-footer">
                            <span class="photographer-price"><?php echo htmlspecialchars($photographer['price']); ?></span>
                            <a href="?page=client-dashboard&photographer_id=<?php echo $photographer['id']; ?>" class="btn btn-book">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <a href="?page=search" class="btn btn-outline">
                    View All Photographers
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="stats-grid">
                <div class="stat-card fade-in-up">
                    <div class="stat-icon bg-teal-500">
                        <i class="fas fa-camera text-white"></i>
                    </div>
                    <div class="stat-value">500+</div>
                    <div class="stat-label">Professional Photographers</div>
                </div>
                
                <div class="stat-card fade-in-up" style="animation-delay: 0.1s;">
                    <div class="stat-icon bg-teal-500">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <div class="stat-value">10K+</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                
                <div class="stat-card fade-in-up" style="animation-delay: 0.2s;">
                    <div class="stat-icon bg-teal-500">
                        <i class="fas fa-award text-white"></i>
                    </div>
                    <div class="stat-value">25K+</div>
                    <div class="stat-label">Successful Events</div>
                </div>
                
                <div class="stat-card fade-in-up" style="animation-delay: 0.3s;">
                    <div class="stat-icon bg-teal-500">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div class="stat-value">15+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 bg-black text-white">
        <div class="max-w-4xl mx-auto text-center">
            <div class="fade-in-up">
                <h2 class="cta-title mb-6">
                    Ready to capture your story?
                </h2>
                <p class="cta-subtitle mb-8 max-w-2xl mx-auto">
                    Join thousands of satisfied clients who trust our platform for their most important moments.
                </p>
                <div class="cta-buttons">
                    <a href="?page=client-dashboard" class="btn btn-hero mr-4">
                        Book a Photographer
                    </a>
                    <a href="?page=photographer-dashboard" class="btn btn-outline-white">
                        Join as Photographer
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>