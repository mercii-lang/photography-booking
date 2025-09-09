<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200 shadow-md backdrop-filter backdrop-blur-md bg-opacity-90">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <!-- Logo -->
    <a href="?page=landing" class="flex items-center space-x-3 text-2xl font-semibold text-gray-900 hover:scale-105 transition-transform duration-300 ease-in-out">
      <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center shadow-lg">
        <i class="fas fa-camera text-white text-lg"></i>
      </div>
      <span>PhotoBooking</span>
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex flex-1 justify-center space-x-12">
      <a href="?page=landing" class="nav-link <?php echo ($current_page === 'landing') ? 'active' : ''; ?>">Home</a>
      <a href="?page=search" class="nav-link <?php echo ($current_page === 'search') ? 'active' : ''; ?>">Find Photographers</a>
      <a href="#how-it-works" class="nav-link">How It Works</a>
      <a href="#pricing" class="nav-link">Pricing</a>
    </nav>

    <!-- Desktop User Menu & CTA -->
    <div class="hidden md:flex items-center space-x-8">
      <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Logged in user -->
        <a href="?page=client-dashboard" class="btn btn-outline px-6 py-2 rounded-md text-sm font-medium transition-transform hover:scale-105">Dashboard</a>

        <!-- User Avatar -->
        <div class="relative user-menu">
          <button class="user-avatar shadow-md" onclick="toggleUserMenu()">
            <i class="fas fa-user text-gray-600"></i>
          </button>

          <div id="userDropdown" class="user-dropdown hidden shadow-lg rounded-lg">
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'client'): ?>
              <a href="?page=client-dashboard" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Client Dashboard
              </a>
            <?php elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'photographer'): ?>
              <a href="?page=photographer-dashboard" class="dropdown-item">
                <i class="fas fa-camera mr-2"></i> Photographer Portal
              </a>
            <?php elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
              <a href="?page=admin-dashboard" class="dropdown-item">
                <i class="fas fa-cog mr-2"></i> Admin Panel
              </a>
            <?php endif; ?>
            <a href="#settings" class="dropdown-item">
              <i class="fas fa-cog mr-2"></i> Settings
            </a>
            <a href="?logout=1" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
          </div>
        </div>
      <?php else: ?>
        <!-- Not logged in -->
        <a href="?page=login" class="btn btn-outline px-6 py-2 rounded-md text-sm font-medium transition-transform hover:scale-105">Sign In</a>
        <a href="?page=signup" class="btn btn-primary px-6 py-2 rounded-md text-sm font-semibold transition-transform hover:scale-105">Sign Up</a>
      <?php endif; ?>
    </div>

    <!-- Mobile Menu Button -->
    <button class="md:hidden text-gray-700 p-2 hover:text-teal-600 transition-colors duration-300 ease-in-out" onclick="toggleMobileMenu()">
      <i id="mobileMenuIcon" class="fas fa-bars text-2xl"></i>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="md:hidden bg-white border-t border-gray-200 hidden shadow-lg">
    <div class="px-6 py-4 space-y-4">
      <a href="?page=landing" class="mobile-nav-link <?php echo ($current_page === 'landing') ? 'active' : ''; ?>">Home</a>
      <a href="?page=search" class="mobile-nav-link <?php echo ($current_page === 'search') ? 'active' : ''; ?>">Find Photographers</a>
      <a href="#how-it-works" class="mobile-nav-link">How It Works</a>
      <a href="#pricing" class="mobile-nav-link">Pricing</a>

      <div class="pt-4 border-t border-gray-200 space-y-2">
        <?php if (isset($_SESSION['user_id'])): ?>
          <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'client'): ?>
            <a href="?page=client-dashboard" class="btn btn-outline w-full transition-transform hover:scale-105">Client Dashboard</a>
          <?php elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'photographer'): ?>
            <a href="?page=photographer-dashboard" class="btn btn-primary w-full transition-transform hover:scale-105">Photographer Portal</a>
          <?php elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <a href="?page=admin-dashboard" class="btn btn-primary w-full transition-transform hover:scale-105">Admin Panel</a>
          <?php endif; ?>
          <a href="?logout=1" class="btn btn-outline w-full transition-transform hover:scale-105">Logout</a>
        <?php else: ?>
          <a href="?page=login" class="btn btn-outline w-full transition-transform hover:scale-105">Sign In</a>
          <a href="?page=signup" class="btn btn-primary w-full transition-transform hover:scale-105">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<script>
function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  const icon = document.getElementById('mobileMenuIcon');

  if (menu.classList.contains('hidden')) {
    menu.classList.remove('hidden');
    menu.style.maxHeight = '0px';
    setTimeout(() => {
      menu.style.maxHeight = menu.scrollHeight + 'px';
    }, 10);
    setTimeout(() => {
      icon.className = 'fas fa-times text-2xl transition-transform duration-300 ease-in-out';
      icon.style.transform = 'rotate(180deg)';
    }, 150);
  } else {
    menu.style.maxHeight = '0px';
    icon.style.transform = 'rotate(0deg)';
    setTimeout(() => {
      icon.className = 'fas fa-bars text-2xl transition-transform duration-300 ease-in-out';
    }, 150);
    setTimeout(() => {
      menu.classList.add('hidden');
      menu.style.maxHeight = '';
    }, 300);
  }
}

function toggleUserMenu() {
  const dropdown = document.getElementById('userDropdown');

  if (dropdown.classList.contains('hidden')) {
    dropdown.classList.remove('hidden');
    dropdown.style.opacity = '0';
    dropdown.style.transform = 'translateY(-10px)';
    setTimeout(() => {
      dropdown.style.opacity = '1';
      dropdown.style.transform = 'translateY(0)';
    }, 10);
  } else {
    dropdown.style.opacity = '0';
    dropdown.style.transform = 'translateY(-10px)';
    setTimeout(() => {
      dropdown.classList.add('hidden');
      dropdown.style.opacity = '';
      dropdown.style.transform = '';
    }, 200);
  }
}

// Add smooth scroll behavior for navigation links
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

// Add scroll effect to navigation
let lastScrollTop = 0;
const navbar = document.querySelector('nav');

window.addEventListener('scroll', function() {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop && scrollTop > 100) {
    // Scrolling down
    navbar.style.transform = 'translateY(-100%)';
  } else {
    // Scrolling up
    navbar.style.transform = 'translateY(0)';
  }

  // Add background blur on scroll
  if (scrollTop > 50) {
    navbar.classList.add('bg-opacity-95');
  } else {
    navbar.classList.remove('bg-opacity-95');
  }

  lastScrollTop = scrollTop;
});

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
  const userMenu = document.querySelector('.user-menu');
  const mobileMenu = document.getElementById('mobileMenu');
  const userDropdown = document.getElementById('userDropdown');

  if (userMenu && !userMenu.contains(event.target)) {
    if (!userDropdown.classList.contains('hidden')) {
      toggleUserMenu();
    }
  }

  if (!event.target.closest('.md\\:hidden') && !event.target.closest('#mobileMenu') && mobileMenu) {
    if (!mobileMenu.classList.contains('hidden')) {
      toggleMobileMenu();
    }
  }
});

// Add keyboard navigation support
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    const userDropdown = document.getElementById('userDropdown');
    const mobileMenu = document.getElementById('mobileMenu');

    if (userDropdown && !userDropdown.classList.contains('hidden')) {
      toggleUserMenu();
    }

    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
      toggleMobileMenu();
    }
  }
});
</script>
