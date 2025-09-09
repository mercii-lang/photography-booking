<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <!-- Logo -->
    <a href="?page=landing" class="flex items-center space-x-3 text-2xl font-semibold text-gray-900 hover:scale-105 transition-transform">
      <div class="w-10 h-10 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg flex items-center justify-center">
        <i class="fas fa-camera text-white text-lg"></i>
      </div>
      <span>PhotoBooking</span>
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex flex-1 justify-center space-x-10">
      <a href="?page=landing" class="nav-link <?php echo ($current_page === 'landing') ? 'active' : ''; ?>">Home</a>
      <a href="?page=search" class="nav-link <?php echo ($current_page === 'search') ? 'active' : ''; ?>">Find Photographers</a>
      <a href="#how-it-works" class="nav-link">How It Works</a>
      <a href="#pricing" class="nav-link">Pricing</a>
    </nav>

    <!-- Desktop User Menu & CTA -->
    <div class="hidden md:flex items-center space-x-6">
      <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Logged in user -->
        <a href="?page=client-dashboard" class="btn btn-outline px-5 py-2 rounded-md text-sm font-medium">Dashboard</a>

        <!-- User Avatar -->
        <div class="relative user-menu">
          <button class="user-avatar" onclick="toggleUserMenu()">
            <i class="fas fa-user text-gray-600"></i>
          </button>

          <div id="userDropdown" class="user-dropdown hidden">
            <?php if ($_SESSION['user_role'] === 'client'): ?>
              <a href="?page=client-dashboard" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Client Dashboard
              </a>
            <?php elseif ($_SESSION['user_role'] === 'photographer'): ?>
              <a href="?page=photographer-dashboard" class="dropdown-item">
                <i class="fas fa-camera mr-2"></i> Photographer Portal
              </a>
            <?php elseif ($_SESSION['user_role'] === 'admin'): ?>
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
        <a href="?page=login" class="btn btn-outline px-5 py-2 rounded-md text-sm font-medium">Sign In</a>
        <a href="?page=signup" class="btn btn-primary px-5 py-2 rounded-md text-sm font-semibold">Sign Up</a>
      <?php endif; ?>
    </div>

    <!-- Mobile Menu Button -->
    <button class="md:hidden text-gray-700 p-2 hover:text-teal-600 transition-colors" onclick="toggleMobileMenu()">
      <i id="mobileMenuIcon" class="fas fa-bars text-2xl"></i>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="md:hidden bg-white border-t border-gray-200 hidden">
    <div class="px-6 py-4 space-y-4">
      <a href="?page=landing" class="mobile-nav-link <?php echo ($current_page === 'landing') ? 'active' : ''; ?>">Home</a>
      <a href="?page=search" class="mobile-nav-link <?php echo ($current_page === 'search') ? 'active' : ''; ?>">Find Photographers</a>
      <a href="#how-it-works" class="mobile-nav-link">How It Works</a>
      <a href="#pricing" class="mobile-nav-link">Pricing</a>

      <div class="pt-4 border-t border-gray-200 space-y-2">
        <?php if (isset($_SESSION['user_id'])): ?>
          <?php if ($_SESSION['user_role'] === 'client'): ?>
            <a href="?page=client-dashboard" class="btn btn-outline w-full">Client Dashboard</a>
          <?php elseif ($_SESSION['user_role'] === 'photographer'): ?>
            <a href="?page=photographer-dashboard" class="btn btn-primary w-full">Photographer Portal</a>
          <?php elseif ($_SESSION['user_role'] === 'admin'): ?>
            <a href="?page=admin-dashboard" class="btn btn-primary w-full">Admin Panel</a>
          <?php endif; ?>
          <a href="?logout=1" class="btn btn-outline w-full">Logout</a>
        <?php else: ?>
          <a href="?page=login" class="btn btn-outline w-full">Sign In</a>
          <a href="?page=signup" class="btn btn-primary w-full">Sign Up</a>
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
    icon.className = 'fas fa-times text-2xl';
  } else {
    menu.classList.add('hidden');
    icon.className = 'fas fa-bars text-2xl';
  }
}

function toggleUserMenu() {
  const dropdown = document.getElementById('userDropdown');
  dropdown.classList.toggle('hidden');
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
  const userMenu = document.querySelector('.user-menu');
  const mobileMenu = document.getElementById('mobileMenu');

  if (!userMenu.contains(event.target)) {
    document.getElementById('userDropdown').classList.add('hidden');
  }

  if (!event.target.closest('.md\\:hidden') && !event.target.closest('#mobileMenu')) {
    mobileMenu.classList.add('hidden');
    document.getElementById('mobileMenuIcon').className = 'fas fa-bars text-2xl';
  }
});
</script>
