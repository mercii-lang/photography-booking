// Photography Platform JavaScript

// Initialize the app when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeAnimations();
    initializeInteractions();
    initializeForms();
});

// Animation observers
function initializeAnimations() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all fade-in elements
    document.querySelectorAll('.fade-in-up, .fade-in-up-delay-200, .fade-in-up-delay-400').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });

    // Stagger animations for grid items
    document.querySelectorAll('.photographer-card, .stat-card').forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
}

// Interactive elements
function initializeInteractions() {
    // Color swatch selection
    document.querySelectorAll('.color-swatch').forEach(swatch => {
        swatch.addEventListener('click', function() {
            // Remove selected class from all swatches
            document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('selected'));
            // Add selected class to clicked swatch
            this.classList.add('selected');
        });
    });

    // Photographer card hover effects
    document.querySelectorAll('.photographer-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Booking card interactions
    document.querySelectorAll('.booking-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 10px 15px -3px rgba(0, 0, 0, 0.1)';
        });
    });

    // Gallery card interactions
    document.querySelectorAll('.gallery-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            const image = this.querySelector('.gallery-image');
            if (image) {
                image.style.transform = 'scale(1.1)';
            }
        });

        card.addEventListener('mouseleave', function() {
            const image = this.querySelector('.gallery-image');
            if (image) {
                image.style.transform = 'scale(1)';
            }
        });
    });

    // Button hover effects
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (!this.classList.contains('btn-outline')) {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 8px 15px rgba(0, 0, 0, 0.15)';
            }
        });

        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
}

// Form handling
function initializeForms() {
    // Search form
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const eventType = this.querySelector('[name="event_type"]').value;
            const date = this.querySelector('[name="date"]').value;
            const location = this.querySelector('[name="location"]').value;

            if (!eventType && !date && !location) {
                e.preventDefault();
                showNotification('Please fill in at least one search field', 'warning');
                return;
            }

            // Add loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Searching...';
            submitBtn.disabled = true;
        });
    }

    // File upload handling
    const uploadArea = document.querySelector('.upload-area');
    if (uploadArea) {
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        uploadArea.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            uploadArea.style.borderColor = '#008080';
            uploadArea.style.backgroundColor = 'rgba(8, 128, 128, 0.05)';
        }

        function unhighlight() {
            uploadArea.style.borderColor = '#d1d5db';
            uploadArea.style.backgroundColor = '';
        }

        function handleDrop(e) {
            const files = e.dataTransfer.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    showNotification(`File "${file.name}" uploaded successfully!`, 'success');
                } else {
                    showNotification(`File "${file.name}" is not an image`, 'error');
                }
            });
        }
    }

    // Checkbox interactions
    document.querySelectorAll('.checkbox-item').forEach(item => {
        item.addEventListener('click', function() {
            const checkbox = this.querySelector('.checkbox-input');
            checkbox.checked = !checkbox.checked;
        });
    });
}

// Utility functions
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getIconForType(type)} mr-2"></i>
            <span>${message}</span>
            <button class="notification-close" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

    // Add notification styles
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 1000;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        animation: slideIn 0.3s ease-out;
        background: ${getBackgroundForType(type)};
        color: ${getColorForType(type)};
        border-left: 4px solid ${getBorderColorForType(type)};
    `;

    document.body.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-in';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

function getIconForType(type) {
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    return icons[type] || icons.info;
}

function getBackgroundForType(type) {
    const backgrounds = {
        success: '#f0fdf4',
        error: '#fef2f2',
        warning: '#fffbeb',
        info: '#f0f9ff'
    };
    return backgrounds[type] || backgrounds.info;
}

function getColorForType(type) {
    const colors = {
        success: '#166534',
        error: '#991b1b',
        warning: '#92400e',
        info: '#1e40af'
    };
    return colors[type] || colors.info;
}

function getBorderColorForType(type) {
    const colors = {
        success: '#22c55e',
        error: '#ef4444',
        warning: '#f59e0b',
        info: '#3b82f6'
    };
    return colors[type] || colors.info;
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    .notification-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .notification-close {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.25rem;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .notification-close:hover {
        opacity: 1;
    }
`;
document.head.appendChild(style);

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Progressive image loading
function initializeImageLoading() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('loading');
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}

// Initialize image loading
initializeImageLoading();