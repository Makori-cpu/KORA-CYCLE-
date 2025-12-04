<?php // healthlibrary.php - Health Library page using shared PHP nav include ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kora Cycle Health Library</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Configure Tailwind to use Poppins font and custom colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'kora-pink-light': '#fff5f8', // Light background start color
                        'kora-pink-deep': '#fde6ec',  // Light background end color
                        'kora-coral': '#ff6b6b',      // Primary CTA pink/coral
                        'kora-text': '#333333',       // Dark text
                    },
                    boxShadow: {
                        'card': '0 10px 30px -5px rgba(255, 107, 107, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                    }
                },
            },
        };
    </script>

    <!-- Custom Gradient and Animation Styles -->
    <style>
        /* Apply the soft pink gradient background */
        body {
            background: linear-gradient(180deg, var(--tw-colors-kora-pink-light) 0%, var(--tw-colors-kora-pink-deep) 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        /* Styles for the fade-in animation on scroll */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-in-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>
    
    <!-- === HEADER & SEARCH SECTION === -->
    <section class="py-16 bg-white border-b border-kora-pink-deep">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-4xl fade-in-up">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-kora-coral mb-4">
                The Kora Health Library
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Science-backed articles, tailored insights, and wellness tips for every stage of life.
            </p>

            <!-- Search Bar -->
            <div class="max-w-xl mx-auto flex">
                <input type="search" placeholder="Search articles, symptoms, or phases..." class="w-full px-5 py-3 border border-gray-300 rounded-l-full focus:ring-kora-coral focus:border-kora-coral shadow-sm text-gray-700" />
                <button class="bg-kora-coral text-white px-6 py-3 rounded-r-full hover:bg-red-500 transition duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>

        </div>
    </section>

    <!-- === FEATURED ARTICLE SECTION === -->
    <section class="py-20 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-kora-text mb-8 fade-in-up">Featured Insight</h2>
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2 fade-in-up">
            
            <!-- Left: Image -->
            <div class="h-64 md:h-full bg-gray-200">
                <img src="Screenshot 2025-11-12 113509.png" alt="Placeholder image for an article on skin health and diet." class="w-full h-full object-cover"/>
            </div>

            <!-- Right: Content -->
            <div class="p-8 lg:p-12 flex flex-col justify-center">
                <p class="text-sm font-semibold text-kora-coral uppercase mb-2">Hormones & Diet</p>
                <h3 class="text-3xl font-bold text-kora-text mb-4">
                    Why Sugar Accelerates Skin Aging: The Science of Glycation
                </h3>
                <p class="text-gray-600 mb-6">
                    Excess sugar permanently damages collagen and elastin fibers in your skin through a process called glycation, leading to stiffness, wrinkles, and inflammation.
                </p>
                <a href="sugar-skin-aging-article.php" class="text-kora-coral font-bold hover:underline transition duration-200 flex items-center">
                    Read Full Article
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- === ARTICLES GRID === -->
    <section class="py-20 lg:pb-32 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-kora-text mb-8 fade-in-up">Latest Articles</h2>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Article Card 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 fade-in-up">
                <img src="https://placehold.co/400x250/ff6b6b/ffffff?text=Tracking+BBT" alt="A thermometer graphic representing basal body temperature tracking." class="w-full h-40 object-cover"/>
                <div class="p-6">
                    <p class="text-sm font-semibold text-kora-coral uppercase mb-1">Fertility</p>
                    <h3 class="text-xl font-bold text-kora-text mb-3">
                        Mastering BBT: Your Guide to Tracking Basal Body Temperature
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Learn how small temperature shifts unlock big insights into your ovulation window.
                    </p>
                    <a href="#" class="text-kora-coral text-sm font-semibold hover:underline">Read Article &rarr;</a>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 fade-in-up" style="transition-delay: 100ms;">
                <img src="https://placehold.co/400x250/fde6ec/ff6b6b?text=Hormone+Phases" alt="A graphic illustrating the four main phases of the menstrual cycle." class="w-full h-40 object-cover"/>
                <div class="p-6">
                    <p class="text-sm font-semibold text-kora-coral uppercase mb-1">Cycle Education</p>
                    <h3 class="text-xl font-bold text-kora-text mb-3">
                        The Four Seasons of Your Cycle: Hormones Explained
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        A detailed breakdown of the follicular, ovulation, luteal, and menstrual phases and how they affect your mood.
                    </p>
                    <a href="#" class="text-kora-coral text-sm font-semibold hover:underline">Read Article &rarr;</a>
                </div>
            </div>
            
            <!-- Article Card 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 fade-in-up" style="transition-delay: 200ms;">
                <img src="https://placehold.co/400x250/ff6b6b/ffffff?text=Menopause+Tips" alt="A woman meditating, representing calm during menopause." class="w-full h-40 object-cover"/>
                <div class="p-6">
                    <p class="text-sm font-semibold text-kora-coral uppercase mb-1">Menopause</p>
                    <h3 class="text-xl font-bold text-kora-text mb-3">
                        Managing Hot Flashes: Natural Remedies & Diet Changes
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Practical, non-hormonal strategies to reduce the frequency and severity of menopausal symptoms.
                    </p>
                    <a href="#" class="text-kora-coral text-sm font-semibold hover:underline">Read Article &rarr;</a>
                </div>
            </div>
            
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-12 fade-in-up">
            <button class="px-8 py-3 bg-kora-text text-white font-bold text-base rounded-full shadow-lg hover:bg-gray-700 transition duration-300">
                Load More Articles
            </button>
        </div>
    </section>

    <!-- === FOOTER SECTION (Re-used for consistency) === -->
    <footer class="bg-kora-pink-deep pt-16 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 border-b pb-10 border-gray-300">
                <!-- Brand Info -->
                <div class="col-span-2 md:col-span-1">
                    <h4 class="text-2xl font-extrabold text-kora-coral mb-4">Kora Cycle</h4>
                    <p class="text-gray-600 text-sm">Empowering women with health insights.</p>
                </div>
                
                <!-- Company Links -->
                <div>
                    <h5 class="text-kora-text font-bold mb-4">Company</h5>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-kora-coral">About Us</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Careers</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Contact</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h5 class="text-kora-text font-bold mb-4">Legal</h5>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-kora-coral">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Cookie Policy</a></li>
                    </ul>
                </div>
                
                <!-- Support Links -->
                <div>
                    <h5 class="text-kora-text font-bold mb-4">Support</h5>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-kora-coral">Help Center</a></li>
                        <li><a href="#" class="hover:text-kora-coral">For Clinicians</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Calculators</a></li>
                    </ul>
                </div>

                <!-- Social Icons -->
                <div class="col-span-2 md:col-span-1">
                    <h5 class="text-kora-text font-bold mb-4">Connect</h5>
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="#" class="text-gray-600 hover:text-kora-coral">...</a>
                        <!-- Twitter -->
                        <a href="#" class="text-gray-600 hover:text-kora-coral">...</a>
                        <!-- Instagram -->
                        <a href="#" class="text-gray-600 hover:text-kora-coral">...</a>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="mt-10 pt-4 border-t border-gray-300 text-center">
                <p class="text-sm text-gray-500">&copy; 2025 Kora Cycle. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle (safe: only runs if elements exist) -->
    <script>
        (function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        })();
    </script>

    <!-- JavaScript for Scroll Animation -->
    <script>
        // === Scroll Fade-In Animation ===
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                // Check if the element is visible
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Stop observing once visible
                    observer.unobserve(entry.target);
                }
            });
        }, {
            // Options: rootMargin controls when the intersection is triggered
            rootMargin: '0px 0px -100px 0px', // Trigger 100px before reaching the bottom of the viewport
            threshold: 0.1 // 10% of the item must be visible
        });

        // Get all elements with the animation class and start observing
        document.querySelectorAll('.fade-in-up').forEach(element => {
            observer.observe(element);
        });
    </script>

</body>
</html>
