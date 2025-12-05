<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
    header('Location: login.php');
    exit;
}

$update_success = false;
$update_error = '';

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $cycle_length = intval($_POST['cycle_length'] ?? 0);

    // Validation
    if (empty($name) || empty($email)) {
        $update_error = 'Name and email are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $update_error = 'Please enter a valid email address.';
    } elseif ($cycle_length > 0 && ($cycle_length < 21 || $cycle_length > 45)) {
        $update_error = 'Cycle length must be between 21 and 45 days.';
    } else {
        // In production, save to database
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_phone'] = $phone;
        $_SESSION['user_dob'] = $dob;
        $_SESSION['user_cycle_length'] = $cycle_length;
        $update_success = true;
    }
}

$page_title = 'My Profile — Kora Cycle';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <!-- Profile Header -->
    <section class="py-16 bg-white border-b border-kora-pink-deep">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-kora-coral">
                My Profile
            </h1>
            <p class="text-lg text-gray-600 mt-2">
                Update your personal information and cycle preferences
            </p>
        </div>
    </section>

    <!-- Profile Form -->
    <main class="py-16 lg:py-24 container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white p-8 sm:p-10 rounded-3xl shadow-2xl shadow-kora-coral/20">
            
            <!-- Success Message -->
            <?php if ($update_success): ?>
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm font-medium">
                    ✓ Profile updated successfully!
                </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if ($update_error): ?>
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm font-medium">
                    <?php echo htmlspecialchars($update_error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="profile.php" class="space-y-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Name
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        value="<?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base"
                    >
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base"
                    >
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number <span class="text-gray-500 text-xs">(optional)</span>
                    </label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="+254..."
                        value="<?php echo htmlspecialchars($_SESSION['user_phone'] ?? ''); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base"
                    >
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700 mb-2">
                        Date of Birth <span class="text-gray-500 text-xs">(optional)</span>
                    </label>
                    <input
                        type="date"
                        id="dob"
                        name="dob"
                        value="<?php echo htmlspecialchars($_SESSION['user_dob'] ?? ''); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base"
                    >
                </div>

                <!-- Cycle Length -->
                <div>
                    <label for="cycle_length" class="block text-sm font-medium text-gray-700 mb-2">
                        Average Cycle Length (days) <span class="text-gray-500 text-xs">(optional)</span>
                    </label>
                    <input
                        type="number"
                        id="cycle_length"
                        name="cycle_length"
                        min="21"
                        max="45"
                        placeholder="e.g., 28"
                        value="<?php echo $_SESSION['user_cycle_length'] ?? ''; ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base"
                    >
                    <p class="mt-1 text-xs text-gray-500">Between 21 and 45 days</p>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full mt-8 px-6 py-3 bg-kora-coral text-white font-bold text-lg rounded-xl shadow-lg hover:bg-red-500 transition duration-300 transform hover:scale-105"
                >
                    Save Changes
                </button>

                <!-- Back Link -->
                <div class="text-center pt-4">
                    <a href="dashboard.php" class="text-kora-coral hover:text-red-500 font-semibold transition duration-200">
                        ← Back to Dashboard
                    </a>
                </div>
            </form>

            <!-- Account Actions -->
            <div class="mt-10 pt-10 border-t border-gray-300">
                <h2 class="text-xl font-bold text-kora-coral mb-6">Account Actions</h2>
                <div class="space-y-3">
                    <a href="#" class="block p-4 border border-gray-300 rounded-xl hover:bg-kora-pink-light transition duration-200">
                        <p class="font-semibold text-gray-700">Change Password</p>
                        <p class="text-sm text-gray-600">Update your password for security</p>
                    </a>
                    <a href="#" class="block p-4 border border-gray-300 rounded-xl hover:bg-kora-pink-light transition duration-200">
                        <p class="font-semibold text-gray-700">Download Data</p>
                        <p class="text-sm text-gray-600">Export your personal data</p>
                    </a>
                    <a href="dashboard.php?logout=true" class="block p-4 border border-red-300 rounded-xl hover:bg-red-100 transition duration-200">
                        <p class="font-semibold text-red-700">Logout</p>
                        <p class="text-sm text-red-600">Sign out from your account</p>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
