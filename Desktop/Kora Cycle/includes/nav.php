<?php /* Shared navigation include for Kora Cycle */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="sticky top-0 z-50 bg-kora-pink-light/90 backdrop-blur-sm shadow-sm">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Logo/Brand Name -->
        <a href="index.php" class="text-2xl font-extrabold text-kora-coral">Kora Cycle</a>

        <!-- Desktop Links -->
        <div class="hidden md:flex items-center space-x-8 text-kora-text font-semibold">
            <a href="product.php" class="hover:text-kora-coral transition duration-200">Product</a>
            <a href="healthlibrary.php" class="hover:text-kora-coral transition duration-200">Health Library</a>
            <a href="calculator.php" class="hover:text-kora-coral transition duration-200">Calculators</a>
            <a href="about.php" class="hover:text-kora-coral transition duration-200">About</a>
            <a href="forclinicians.php" class="hover:text-kora-coral transition duration-200">For Clinicians</a>
            <a href="subscribtions.php" class="hover:text-kora-coral transition duration-200">Manage Subscription</a>
        </div>

        <!-- Auth Buttons (Desktop) -->
        <div class="hidden md:flex items-center space-x-4">
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                <a href="dashboard.php" class="px-4 py-2 text-kora-coral font-semibold hover:text-red-500 transition duration-200">
                    Dashboard
                </a>
                <a href="dashboard.php?logout=true" class="px-6 py-3 bg-kora-coral text-white font-bold text-sm rounded-full shadow-lg hover:shadow-xl hover:bg-red-500 transition duration-300">
                    Logout
                </a>
            <?php else: ?>
                <a href="login.php" class="px-4 py-2 text-kora-coral font-semibold hover:text-red-500 transition duration-200">
                    Login
                </a>
                <a href="signup.php" class="px-6 py-3 bg-kora-coral text-white font-bold text-sm rounded-full shadow-lg hover:shadow-xl hover:bg-red-500 transition duration-300">
                    Sign Up
                </a>
            <?php endif; ?>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden text-kora-text focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </nav>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden bg-kora-pink-light shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-center">
            <a href="product.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep">Product</a>
            <a href="healthlibrary.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep">Health Library</a>
            <a href="calculator.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep">Calculators</a>
            <a href="about.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep">About</a>
            <a href="forclinicians.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep">For Clinicians</a>
            <a href="subscribtions.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep">Manage Subscription</a>
            
            <!-- Mobile Auth Links -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                <a href="dashboard.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep text-kora-coral">Dashboard</a>
                <a href="dashboard.php?logout=true" class="block mx-auto mt-3 px-6 py-3 bg-kora-coral text-white font-bold text-sm rounded-full hover:bg-red-500 transition duration-300 w-max">
                    Logout
                </a>
            <?php else: ?>
                <a href="login.php" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-kora-pink-deep text-kora-coral">Login</a>
                <a href="signup.php" class="block mx-auto mt-3 px-6 py-3 bg-kora-coral text-white font-bold text-sm rounded-full hover:bg-red-500 transition duration-300 w-max">
                    Sign Up
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

