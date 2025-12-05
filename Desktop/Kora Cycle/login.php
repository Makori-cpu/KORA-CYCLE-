<?php
session_start();

// Handle login form submission
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $name = trim($_POST['name'] ?? '');

    // Basic validation
    if (empty($email) || empty($password)) {
        $login_error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $login_error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $login_error = 'Password must be at least 6 characters long.';
    } else {
        // Simulate successful login (in production, validate against database)
        $_SESSION['user_name'] = $name ?: $email;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_logged_in'] = true;
        $_SESSION['login_time'] = date('Y-m-d H:i:s');

        // Redirect to dashboard or home
        header('Location: dashboard.php');
        exit;
    }
}

$page_title = 'Login — Kora Cycle';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
    <style>
        .login-container {
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

    <div class="login-container">
        <div class="w-full max-w-md mx-auto px-4 fade-in-up">
            <!-- Login Card -->
            <div class="bg-white rounded-3xl shadow-2xl shadow-kora-coral/20 p-8 sm:p-10">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold text-kora-coral mb-2">Welcome Back</h1>
                    <p class="text-gray-600 text-base">Sign in to your Kora Cycle account</p>
                </div>

                <!-- Error Message -->
                <?php if ($login_error): ?>
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm font-medium">
                        <?php echo htmlspecialchars($login_error); ?>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="POST" action="login.php" class="space-y-6">
                    <!-- Name Field (Optional) -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name <span class="text-gray-500 text-xs">(optional)</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="e.g., Sarah Otieno"
                            value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
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
                            placeholder="Enter your password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-kora-coral focus:border-transparent shadow-sm text-base transition duration-200"
                        >
                        <p class="mt-1 text-xs text-gray-500">Minimum 6 characters</p>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-kora-coral focus:ring-kora-coral">
                            <span class="ml-2 text-gray-700">Remember me</span>
                        </label>
                        <a href="#" class="text-kora-coral hover:text-red-500 font-medium transition duration-200">Forgot password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full mt-8 px-6 py-3 bg-kora-coral text-white font-bold text-lg rounded-xl shadow-lg hover:bg-red-500 transition duration-300 transform hover:scale-105"
                    >
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-8 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue as guest</span>
                    </div>
                </div>

                <!-- Guest Login Button -->
                <a
                    href="index.php"
                    class="w-full mt-6 px-6 py-3 border-2 border-kora-coral text-kora-coral font-bold text-lg rounded-xl hover:bg-kora-pink-light transition duration-300 text-center block"
                >
                    Continue as Guest
                </a>

                <!-- Sign Up Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-700">
                        Don't have an account?
                        <a href="signup.php" class="text-kora-coral hover:text-red-500 font-bold transition duration-200">Sign up here</a>
                    </p>
                </div>

                <!-- Demo Credentials (for testing) -->
                <div class="mt-8 p-4 bg-kora-pink-light rounded-lg border border-kora-pink-deep">
                    <p class="text-xs font-semibold text-gray-700 mb-2">🧪 Demo Credentials (for testing):</p>
                    <p class="text-xs text-gray-600"><strong>Email:</strong> demo@koracycle.com</p>
                    <p class="text-xs text-gray-600"><strong>Password:</strong> demo123</p>
                </div>
            </div>

            <!-- Footer Text -->
            <div class="mt-8 text-center text-sm text-gray-600">
                <p>By logging in, you agree to our <a href="#" class="text-kora-coral hover:underline">Terms of Service</a> and <a href="#" class="text-kora-coral hover:underline">Privacy Policy</a></p>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
