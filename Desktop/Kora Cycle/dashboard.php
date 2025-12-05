<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
    header('Location: login.php');
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

$user_name = $_SESSION['user_name'] ?? 'User';
$user_email = $_SESSION['user_email'] ?? '';
$login_time = $_SESSION['login_time'] ?? '';

$page_title = 'Dashboard — Kora Cycle';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <!-- Dashboard Header -->
    <section class="py-16 bg-white border-b border-kora-pink-deep">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-kora-coral mb-2">
                        Welcome, <?php echo htmlspecialchars($user_name); ?>! 👋
                    </h1>
                    <p class="text-lg text-gray-600">
                        Manage your cycle and health in one place
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600 mb-2">Logged in as:</p>
                    <p class="font-semibold text-kora-text mb-4"><?php echo htmlspecialchars($user_email); ?></p>
                    <a href="dashboard.php?logout=true" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 transition duration-200">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Dashboard Content -->
    <main class="py-16 lg:py-24 container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            
            <!-- Card: Cycle Tracker -->
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300 border border-kora-pink-deep fade-in-up">
                <div class="text-4xl mb-4">📅</div>
                <h2 class="text-2xl font-bold text-kora-coral mb-3">Cycle Tracker</h2>
                <p class="text-gray-600 mb-6">Log your menstrual cycle and track your patterns over time.</p>
                <a href="calculator.php" class="inline-block px-6 py-3 bg-kora-coral text-white font-bold rounded-lg hover:bg-red-500 transition duration-300">
                    Track Cycle →
                </a>
            </div>

            <!-- Card: Fertility Calculator -->
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300 border border-kora-pink-deep fade-in-up">
                <div class="text-4xl mb-4">💚</div>
                <h2 class="text-2xl font-bold text-kora-coral mb-3">Fertility Window</h2>
                <p class="text-gray-600 mb-6">Discover your most fertile days and plan accordingly.</p>
                <a href="calculator.php" class="inline-block px-6 py-3 bg-kora-coral text-white font-bold rounded-lg hover:bg-red-500 transition duration-300">
                    Calculate →
                </a>
            </div>

            <!-- Card: Health Library -->
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300 border border-kora-pink-deep fade-in-up">
                <div class="text-4xl mb-4">📚</div>
                <h2 class="text-2xl font-bold text-kora-coral mb-3">Health Library</h2>
                <p class="text-gray-600 mb-6">Learn about menstrual health, nutrition, and wellness tips.</p>
                <a href="healthlibrary.php" class="inline-block px-6 py-3 bg-kora-coral text-white font-bold rounded-lg hover:bg-red-500 transition duration-300">
                    Read Articles →
                </a>
            </div>

            <!-- Card: Manage Profile -->
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300 border border-kora-pink-deep fade-in-up">
                <div class="text-4xl mb-4">👤</div>
                <h2 class="text-2xl font-bold text-kora-coral mb-3">My Profile</h2>
                <p class="text-gray-600 mb-6">Update your personal information and preferences.</p>
                <a href="profile.php" class="inline-block px-6 py-3 bg-kora-coral text-white font-bold rounded-lg hover:bg-red-500 transition duration-300">
                    Edit Profile →
                </a>
            </div>

            <!-- Card: Subscription -->
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300 border border-kora-pink-deep fade-in-up">
                <div class="text-4xl mb-4">🎁</div>
                <h2 class="text-2xl font-bold text-kora-coral mb-3">Subscription</h2>
                <p class="text-gray-600 mb-6">Manage your subscription plan and billing.</p>
                <a href="subscribtions.php" class="inline-block px-6 py-3 bg-kora-coral text-white font-bold rounded-lg hover:bg-red-500 transition duration-300">
                    Manage →
                </a>
            </div>

            <!-- Card: Settings -->
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300 border border-kora-pink-deep fade-in-up">
                <div class="text-4xl mb-4">⚙️</div>
                <h2 class="text-2xl font-bold text-kora-coral mb-3">Settings</h2>
                <p class="text-gray-600 mb-6">Configure notifications and privacy settings.</p>
                <a href="settings.php" class="inline-block px-6 py-3 bg-kora-coral text-white font-bold rounded-lg hover:bg-red-500 transition duration-300">
                    Settings →
                </a>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="bg-white p-8 rounded-3xl shadow-lg border border-kora-pink-deep">
            <h2 class="text-2xl font-bold text-kora-coral mb-6">Session Information</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                    <span class="text-gray-700 font-medium">Login Time:</span>
                    <span class="text-gray-600"><?php echo htmlspecialchars($login_time); ?></span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                    <span class="text-gray-700 font-medium">Email:</span>
                    <span class="text-gray-600"><?php echo htmlspecialchars($user_email); ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-700 font-medium">Session Status:</span>
                    <span class="inline-block px-4 py-2 bg-green-100 text-green-700 font-semibold rounded-full text-sm">
                        ✓ Active
                    </span>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
