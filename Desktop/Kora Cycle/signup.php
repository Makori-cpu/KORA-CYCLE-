<?php
session_start();

// Handle signup form submission
$signup_error = '';
$signup_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    // Validation
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $signup_error = 'Please fill in all fields.';
    } elseif (strlen($full_name) < 2) {
        $signup_error = 'Full name must be at least 2 characters.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signup_error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $signup_error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirm_password) {
        $signup_error = 'Passwords do not match.';
    } else {
        // In production, hash password and save to database
        // For now, simulate success
        $_SESSION['signup_success'] = true;
        $_SESSION['new_user_email'] = $email;
        
        // Redirect to login
        header('Location: login.php?signup=success');
        exit;
    }
}

$page_title = 'Sign Up — Kora Cycle';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
    <style>
        .signup-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--kora-pink-light) 0%, var(--kora-pink-deep) 100%);
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <div class="signup-container">
        <div class="w-full max-w-md mx-auto px-4 fade-in-up">
            <!-- Signup Card -->
            <div class="bg-white rounded-3xl shadow-2xl shadow-kora-coral/20 p-8 sm:p-10">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold text-kora-coral mb-2">Create Account</h1>
                    <p class="text-gray-600 text-base">Join Kora Cycle to track your cycle</p>
                </div>

                <!-- Success Message -->
                <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm font-medium">
                        Account created successfully! Please log in.
                    </div>
                <?php endif; ?>

                <!-- Error Message -->
                <?php if ($signup_error): ?>
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm font-medium">
                        <?php echo htmlspecialchars($signup_error); ?>
                    </div>
                <?php endif; ?>

                <!-- Signup Form -->
                <form method="POST" action="signup.php" class="space-y-6">
                    <!-- Full Name Field -->
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name
                        </label>
                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            required
                            placeholder="e.g., Sarah Otieno"
                            value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base transition duration-200"
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
                            placeholder="you@example.com"
                            value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base transition duration-200"
                        >
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            placeholder="Create a strong password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base transition duration-200"
                        >
                        <p class="mt-1 text-xs text-gray-500">Minimum 6 characters</p>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm Password
                        </label>
                        <input
                            type="password"
                            id="confirm_password"
                            name="confirm_password"
                            required
                            placeholder="Re-enter your password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base transition duration-200"
                        >
                    </div>

                    <!-- Terms Checkbox -->
                    <label class="flex items-start cursor-pointer">
                        <input type="checkbox" name="terms" required class="w-4 h-4 rounded border-gray-300 text-kora-coral focus:ring-kora-coral mt-1">
                        <span class="ml-3 text-sm text-gray-700">
                            I agree to the <a href="#" class="text-kora-coral hover:underline">Terms of Service</a> and <a href="#" class="text-kora-coral hover:underline">Privacy Policy</a>
                        </span>
                    </label>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full mt-8 px-6 py-3 bg-kora-coral text-white font-bold text-lg rounded-xl shadow-lg hover:bg-red-500 transition duration-300 transform hover:scale-105"
                    >
                        Create Account
                    </button>
                </form>

                <!-- Sign In Link -->
                <div class="mt-8 text-center">
                    <p class="text-gray-700">
                        Already have an account?
                        <a href="login.php" class="text-kora-coral hover:text-red-500 font-bold transition duration-200">Sign in here</a>
                    </p>
                </div>

                <!-- Benefits -->
                <div class="mt-8 p-4 bg-kora-pink-light rounded-lg">
                    <p class="text-xs font-semibold text-gray-700 mb-3">✨ What you'll get:</p>
                    <ul class="text-xs text-gray-600 space-y-1">
                        <li>✓ Track your menstrual cycle</li>
                        <li>✓ Get personalized health insights</li>
                        <li>✓ Predict fertile windows</li>
                        <li>✓ Access educational content</li>
                    </ul>
                </div>
            </div>

            <!-- Footer Text -->
            <div class="mt-8 text-center text-sm text-gray-600">
                <p>Your privacy is important to us. We never share your data.</p>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
