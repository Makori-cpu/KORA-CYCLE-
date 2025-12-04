<?php // product.php - converted from product.html and uses shared nav include ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_title = 'Product — Kora Cycle'; include 'includes/head.php'; ?>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <section class="py-16 bg-white border-b border-kora-pink-deep fade-in-up">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-4xl">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-kora-text mb-4">Personalized Health. Built on Science.</h1>
            <p class="text-xl text-gray-600">Kora Cycle is more than just a calendar. It's a comprehensive platform that analyzes your unique data to provide predictions you can trust.</p>
        </div>
    </section>

    <!-- Other product content (omitted for brevity) -->
    <section class="py-20 lg:py-32 container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-24">
            <div class="grid md:grid-cols-12 gap-12 items-center fade-in-up">
                <div class="md:col-span-6 order-2 md:order-1">
                    <h2 class="text-3xl font-extrabold text-kora-coral mb-4">Precision Period Prediction</h2>
                    <p class="text-lg text-gray-600 mb-6">Our advanced algorithms analyze months of your input—from sleep quality to flow intensity—to build the most accurate model of your cycle.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-kora-pink-deep pt-16 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-10 pt-4 border-t border-gray-300 text-center">
                <p class="text-sm text-gray-500">&copy; 2025 Kora Cycle. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
